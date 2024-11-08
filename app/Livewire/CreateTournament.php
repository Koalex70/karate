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

        session()->flash('status', 'Tournament successfully create');

        return redirect()->to(route('categories', ['tournament' => $tournament->id]));
    }
    public function render()
    {
        return view('livewire.pages.tournaments.create-tournament');
    }
}
