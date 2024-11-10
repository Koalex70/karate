<?php

namespace App\Livewire;

use App\Livewire\Forms\ContestantForm;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Livewire\Component;


class FinalContestant extends Component
{
    public ContestantForm $form;
    public Tournament $tournament;
    public Category $category;
    public Competition $competition;

    public $participants;

    public function mount()
    {
        $this->form->setCompetitionId($this->competition->id);
        $this->form->setPosition(\Route::current()->parameter('position'));

        if ($this->competition->is_final == true) {
            $competitions = Competition::select('id')
                ->where('is_final', true)
                ->where('category_id', $this->category->id)
                ->get();
        } else {
            $competitions = Competition::select('id')
                ->where('is_final', false)
                ->where('next_competition_id', null)
                ->where('category_id', $this->category->id)
                ->get();
        }
        $competitionsIds = $competitions->map(function ($item) {
            return $item->id;
        });

        $contestants = Contestant::whereIn('competition_id', $competitionsIds->toArray())->orderBy('position', 'ASC')->get();

        $participantIds = $contestants->map(function ($item) {
            return $item->participant_id;
        });

        $this->participants = Participant::whereIn('id', $participantIds)->get();
    }

    public function save()
    {
        if ($this->competition->is_final == true) {

            if (!empty($this->form->participant_id)) {
                $this->category->winner_id = $this->form->participant_id;

                $this->category->save();
            }
        } else {
            if (!empty($this->form->participant_id)) {
                $this->category->third_place_id = $this->form->participant_id;

                $this->category->save();
            }
        }

        return redirect()->to(route('categories.edit', [
            'tournament' => $this->tournament,
            'category' => $this->category,
        ]));
    }

    public function render()
    {
        return view('livewire.pages.contestants.edit-contestant');
    }
}
