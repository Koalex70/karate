<?php

namespace App\Livewire\Forms;

use App\Models\Federation;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FederationForm extends Form
{
    public ?Federation $federation;

    #[Validate('required')]
    public $name = '';

    public function setFederation(Federation $federation): void
    {
        $this->federation = $federation;
        $this->name = $federation->name;
    }

    public function store(): void
    {
        $this->validate();

        Federation::create($this->all());
    }

    public function update(): void
    {
        $this->validate();

        $this->federation->update($this->all());
    }
}
