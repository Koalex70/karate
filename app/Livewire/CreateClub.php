<?php

namespace App\Livewire;

use App\Livewire\Forms\ClubForm;
use Livewire\Component;

class CreateClub extends Component
{
    public ClubForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('status', 'Club successfully create');

        return redirect()->to(route('clubs'));
    }

    public function render()
    {
        return view('livewire.pages.clubs.create-club');
    }
}
