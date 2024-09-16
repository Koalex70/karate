<?php

namespace App\Livewire\Forms;

use App\Models\Trainer;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TrainerForm extends Form
{
    public ?Trainer $trainer;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $surname = '';
    public $patronymic = '';
    #[Validate('required')]
    public $club_id = '';

    public function setTrainer(Trainer $trainer): void
    {
        $this->trainer = $trainer;
        $this->name = $trainer->name;
        $this->surname = $trainer->surname;
        $this->patronymic = $trainer->patronymic;
        $this->club_id = $trainer->club_id;
    }

    public function store(): void
    {
        $this->validate();

        Trainer::create($this->all());
    }

    public function update(): void
    {
        $this->validate();

        $this->trainer->update($this->all());
    }
}
