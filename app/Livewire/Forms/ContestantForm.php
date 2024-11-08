<?php

namespace App\Livewire\Forms;

use App\Models\Contestant;
use App\Models\Participant;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContestantForm extends Form
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

    public function store()
    {
        $this->validate();

        Contestant::create($this->all());
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
