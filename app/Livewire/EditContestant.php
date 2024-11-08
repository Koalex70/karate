<?php

namespace App\Livewire;

use App\Livewire\Forms\ContestantForm;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Livewire\Component;


class EditContestant extends Component
{
    public ContestantForm $form;
    public Tournament $tournament;
    public Category $category;
    public ?Contestant $contestant;

    public $participants;

    public function mount(Competition $competition)
    {
        $this->form->setCompetitionId($competition->id);
        $this->form->setPosition(\Route::current()->parameter('position'));

        $competitions = Competition::select('id')->where('next_competition_id', $competition->id)->get();
        $competitionsIds = $competitions->map(function ($item) {
            return $item->id;
        });

        $this->contestant = Contestant::where('position', \Route::current()->parameter('position'))
            ->where('competition_id', $competition->id)
            ->first();

        if (!empty($this->contestant)) {
            $this->form->participant_id = $this->contestant->participant_id;
        }

        $contestants = Contestant::whereIn('competition_id', $competitionsIds->toArray())->orderBy('position', 'ASC');

        if ($this->form->position % 2 == 0) {
            $contestants = $contestants->limit(2)->get();
        } else {
            $contestants = $contestants->limit(2)->offset(2)->get();
        }

        $participantIds = $contestants->map(function ($item) {
            return $item->participant_id;
        });

        $this->participants = Participant::whereIn('id', $participantIds)->get();
    }

    public function save()
    {
        if (!empty($this->contestant)) {
            $this->contestant->update($this->form->all());
        } else {
            $this->form->store();
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
