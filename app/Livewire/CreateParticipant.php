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
