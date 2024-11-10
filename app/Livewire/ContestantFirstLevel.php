<?php

namespace App\Livewire;

use App\Livewire\Forms\ContestantFirstLevelForm;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Livewire\Component;

class ContestantFirstLevel extends Component
{
    public ContestantFirstLevelForm $form;
    public Tournament $tournament;
    public Category $category;
    public ?Contestant $contestant;
    public Competition $competition;

    public $tatami;
    public $fight_number;

    public function updated($property)
    {
        if ($property === 'form.search_participants') {
            $this->form->UpdateSeachParticipants();
        }
    }

    public function updatedTatami($tatami)
    {
        $this->category->tatami = $tatami;
        $this->category->save();
    }

    public function updatedFightNumber($fight_number)
    {
        $this->competition->fight_number = $fight_number ?: null;
        $this->competition->save();
    }

    public function setParticipant(Participant $participant)
    {
        $this->form->participant_id = $participant->id;
        $this->form->search_participants = $participant->getFullName();
        $this->form->participants = [];
    }

    public function mount(Competition $competition)
    {
        $this->competition = $competition;
        $this->form->setCompetitionId($competition->id);
        $this->form->setPosition(\Route::current()->parameter('position'));
        $this->tatami = $this->category->tatami;
        $this->fight_number = $competition->fight_number;

        $this->contestant = Contestant::where('position', \Route::current()->parameter('position'))
            ->where('competition_id', $competition->id)
            ->first();

        if (!empty($this->contestant)) {
            $this->setParticipant(Participant::find($this->contestant->participant_id));
        }
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
        return view('livewire.pages.contestants.first-level');
    }
}
