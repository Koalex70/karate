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

    public function updated($property)
    {
        if ($property === 'form.search_clubs') {
            $this->form->UpdateSeachClubs();
        } else if ($property === 'form.search_trainers') {
            $this->form->UpdateSeachTrainers();
        }
    }

    public function setClub($clubId, $clubName)
    {
        $this->form->club_id = $clubId;
        $this->form->search_clubs = $clubName;
        $this->form->clubs = [];
    }

    public function setTrainer($trainerId, $trainerFullName)
    {
        $this->form->trainer_id = $trainerId;
        $this->form->search_trainers = $trainerFullName;
        $this->form->trainers = [];
    }

    public function render()
    {
        return view('livewire.pages.participants.create-participant');
    }
}
