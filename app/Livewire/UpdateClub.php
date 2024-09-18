<?php

namespace App\Livewire;

use App\Livewire\Forms\ClubForm;
use App\Models\Club;
use Livewire\Component;

class UpdateClub extends Component
{
    public ClubForm $form;

    public function mount(Club $club)
    {
        $this->form->setClub($club);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('status', 'Club successfully updated');

        return redirect()->to(route('clubs'));
    }

    public function updated($property)
    {
        if ($property === 'form.search_federations') {
            $this->form->updateSearchFederations();
        }
    }

    public function setFederation($federationId, $federationName)
    {
        $this->form->federation_id = $federationId;
        $this->form->search_federations = $federationName;
        $this->form->federations = [];
    }

    public function render()
    {
        return view('livewire.pages.clubs.create-club');
    }
}
