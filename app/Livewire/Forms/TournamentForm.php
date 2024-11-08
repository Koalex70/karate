<?php

namespace App\Livewire\Forms;

use App\Models\Tournament;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TournamentForm extends Form
{
    #[Validate('required')]
    public $name = '';

    public function store()
    {
        $this->validate();

        return Tournament::create($this->all());
    }
}
