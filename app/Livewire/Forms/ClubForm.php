<?php

namespace App\Livewire\Forms;

use App\Models\Club;
use App\Models\Federation;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClubForm extends Form
{
    public ?Club $club;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $city = '';
    #[Validate('required')]
    public $federation_id = '';

    public $search_federations = '';
    public $federations = [];

    public function setClub(Club $club): void
    {
        $this->club = $club;
        $this->name = $club->name;
        $this->city = $club->city;
        $this->search_federations = Federation::find($club->federation_id)->name;

        $this->federation_id = $club->federation_id;
    }

    public function updateSearchFederations()
    {
        $this->federation_id = '';

        if ($this->search_federations === '') {
            $this->federations = [];
            return;
        }

        $this->federations = Federation::where('name', 'like', '%' . $this->search_federations . '%')->limit(10)->get();
    }


    public function store(): void
    {
        $this->validate();

        Club::create($this->all());
    }

    public function update(): void
    {
        $this->validate();

        $this->club->update($this->all());
    }
}
