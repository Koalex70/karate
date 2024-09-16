<?php

namespace App\Livewire\Forms;

use App\Models\Club;
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

    public function setClub(Club $club): void
    {
        $this->club = $club;
        $this->name = $club->name;
        $this->city = $club->city;
        $this->federation_id = $club->federation_id;
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
