<?php

namespace App\Livewire;

use App\Livewire\Forms\TournamentForm;
use Livewire\Component;

class CreateTournament extends Component
{
    public TournamentForm $form;

    public function save()
    {
        $tournament = $this->form->store();

        return redirect()->to(route('tournaments.edit', ['tournament' => $tournament]));
    }

    public function render()
    {
        return view('livewire.pages.tournaments.create-tournament');
    }
}
