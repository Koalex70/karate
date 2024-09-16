<?php

namespace App\Livewire;

use App\Livewire\Forms\ParticipantForm;
use Livewire\Component;

class CreateParticipant extends Component
{
    public ParticipantForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('status', 'Participant successfully create');

        return redirect()->to(route('participants'));
    }
    public function render()
    {
        return view('livewire.pages.participants.create-participant');
    }
}
