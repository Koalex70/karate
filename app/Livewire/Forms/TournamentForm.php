<?php

namespace App\Livewire\Forms;

use App\Models\Tournament;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TournamentForm extends Form
{
    public ?Tournament $tournament;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $map_id = '';
    #[Validate('required|numeric|min:2')]
    public $number_of_participants;
    #[Validate('nullable|numeric|min:0')]
    public $age_min;
    #[Validate('nullable|numeric|min:0|max:100')]
    public $age_max;
    #[Validate('nullable|numeric|min:0')]
    public $weight_min;
    #[Validate('nullable|numeric|max:200')]
    public $weight_max;

    public function setTournament(Tournament $tournament): void
    {
        $this->name = $tournament->name;
        $this->number_of_participants = $tournament->number_of_participants;
        $this->map_id = $tournament->map_id;

        $this->age_min = $tournament->age_min ?? null;
        $this->age_max = $tournament->age_max ?? null;
        $this->weight_min = $tournament->weight_min ?? null;
        $this->weight_max = $tournament->weight_max ?? null;
    }

    public function store()
    {
        $this->validate();

        $tournament = Tournament::create($this->all());
        $tournament->generateTournamentNet();

        return $tournament;
    }

    public function update(): void
    {
        $this->validate();

        $this->tournament->update($this->all());
    }
}
