<?php

namespace App\Livewire;

use App\Livewire\Forms\ClubForm;
use App\Livewire\Forms\TrainerForm;
use App\Models\Club;
use App\Models\Trainer;
use Livewire\Component;

class UpdateTrainer extends Component
{
    public TrainerForm $form;

    public function mount(Trainer $trainer)
    {
        $this->form->setTrainer($trainer);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Trainer successfully updated');

        return redirect()->to(route('trainers'));
    }

    public function render()
    {
        return view('livewire.pages.trainers.create-trainer');
    }
}
