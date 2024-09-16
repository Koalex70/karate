<?php

namespace App\Livewire;

use App\Livewire\Forms\FederationForm;
use Livewire\Component;

class CreateFederation extends Component
{
    public FederationForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('status', 'Federation successfully create');

        return redirect()->to(route('federations'));
    }

    public function render()
    {
        return view('livewire.pages.federations.create-federation');
    }
}
