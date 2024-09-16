<?php

namespace App\Livewire\Forms;

use App\Models\Participant;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParticipantForm extends Form
{
    public ?Participant $participant;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $surname = '';
    public $patronymic = '';
    #[Validate('required')]
    public $date_of_birth = '';
    #[Validate('required')]
    public $weight = '';
    #[Validate('required')]
    public $club_id = '';
    #[Validate('required')]
    public $trainer_id = '';
    #[Validate('required')]
    public $rank_id = '';

    public $user_id = '';

    public function setParticipant(Participant $participant)
    {
        $this->participant = $participant;

        $this->name = $participant->name;
        $this->surname = $participant->surname;
        $this->patronymic = $participant->patronymic;
        $this->date_of_birth = $participant->date_of_birth;
        $this->weight = $participant->weight;

        $this->club_id = $participant->club_id;
        $this->trainer_id = $participant->trainer_id;
        $this->rank_id = $participant->rank_id;
    }

    public function store()
    {
        $this->validate();

        $this->user_id = User::factory()->create()->id;//TODO: придумать нормальный механизм регистрации пользователей

        Participant::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->participant->update($this->all());
    }
}
