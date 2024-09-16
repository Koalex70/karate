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

    public function render()
    {
        return view('livewire.pages.trainers.create-trainer');
    }
}
