<?php

namespace App\Livewire;

use App\Livewire\Forms\TournamentForm;
use Livewire\Component;

class CreateTournament extends Component
{
    public TournamentForm $form;

    public function save()
    {
        $this->form->store();

        dd($this->form);

//        return redirect()->to(route('tournaments'));
    }

    public function render()
    {
        return view('livewire.pages.tournaments.create-tournament');
    }
}
