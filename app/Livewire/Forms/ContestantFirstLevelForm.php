<?php

namespace App\Livewire\Forms;

use App\Models\Contestant;
use App\Models\Participant;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContestantFirstLevelForm extends Form
{
    public ?Contestant $contestant;

    #[Validate('nullable|numeric|min:0|max:100')]
    public $points = 0;
    #[Validate('required|boolean')]
    public $is_winner = false;
    #[Validate('required')]
    public $participant_id = '';
    #[Validate('required')]
    public $competition_id = '';
    #[Validate('required|numeric|min:0')]
    public $position;

    public $search_participants = '';
    public $participants = [];

    public function setContestant(Contestant $contestant)
    {
        $this->contestant = $contestant;

        $this->points = $contestant->points;
        $this->is_winner = $contestant->is_winner;
    }

    public function  UpdateSeachParticipants()
    {
        $this->participant_id = '';

        if ($this->search_participants === '') {
            $this->participants = [];
            return;
        }

        $this->participants = Participant::where('name', 'like', '%' . $this->search_participants . '%')
            ->orWhere('surname', 'like', '%' . $this->search_participants . '%')
            ->orWhere('patronymic', 'like', '%' . $this->search_participants . '%')
            ->limit(10)
            ->get();
    }

    public function store()
    {
        $this->validate();

        Contestant::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->contestant->update($this->all());
    }

    public function setCompetitionId($competitionId)
    {
        $this->competition_id = $competitionId;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }
}
