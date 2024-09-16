<?php

namespace App\Livewire;

use App\Livewire\Forms\ParticipantForm;
use App\Models\Participant;
use Livewire\Component;

class UpdateParticipant extends Component
{
    public ParticipantForm $form;

    public function mount(Participant $participant)
    {
        $this->form->setParticipant($participant);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Participant successfully updated');

        return redirect()->to(route('participants'));
    }

    public function render()
    {
        return view('livewire.pages.participants.create-participant');
    }
}
