<?php

namespace App\Livewire;

use App\Models\Tournament;
use Livewire\Component;

class EditTournament extends Component
{
    public Tournament $tournament;

    public $levels;

    public function render()
    {
        return view('livewire.pages.tournaments.edit-tournament');
    }

    public function mount(Tournament $tournament)
    {
        $this->tournament = $tournament;
        $this->levels = $this->tournament->getTournamentNet();
    }
}
