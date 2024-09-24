<?php

namespace App\Livewire;

use App\Livewire\Forms\TrainerForm;
use Livewire\Component;

class CreateTrainer extends Component
{
    public TrainerForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('status', 'Trainer successfully create');

        return redirect()->to(route('trainers'));
    }

    public function updated($property)
    {
        if ($property === 'form.search_clubs') {
            $this->form->UpdateSeachClubs();
        }
    }

    public function setClub($clubId, $clubName)
    {
        $this->form->club_id = $clubId;
        $this->form->search_clubs = $clubName;
        $this->form->clubs = [];
    }

    public function render()
    {
        return view('livewire.pages.trainers.create-trainer');
    }
}
