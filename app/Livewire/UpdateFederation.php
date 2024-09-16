<?php

namespace App\Livewire;

use App\Livewire\Forms\FederationForm;
use App\Models\Federation;
use Livewire\Component;

class UpdateFederation extends Component
{
    public FederationForm $form;

    public function mount(Federation $federation)
    {
        $this->form->setFederation($federation);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Federation successfully updated');

        return redirect()->to(route('federations'));
    }

    public function render()
    {
        return view('livewire.pages.federations.create-federation');
    }
}
