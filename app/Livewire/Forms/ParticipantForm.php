<?php

namespace App\Livewire\Forms;

use App\Models\Club;
use App\Models\Participant;
use App\Models\Trainer;
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

    #[Validate('required|date|before:tomorrow')]
    public $date_of_birth = '';

    #[Validate('required')]
    public $weight = '';

    #[Validate('required')]
    public $club_id = '';

    public $search_clubs = '';
    public $clubs = [];

    #[Validate('required')]
    public $trainer_id = '';

    public $search_trainers = '';
    public $trainers = [];

    #[Validate('required')]
    public $rank_id = '';

    public $user_id = '';

    public function  UpdateSeachClubs()
    {
        $this->club_id = '';

        if ($this->search_clubs === '') {
            $this->clubs = [];
            return;
        }

        $this->clubs = Club::where('name', 'like', '%' . $this->search_clubs . '%')->limit(10)->get();
    }

    public function  UpdateSeachTrainers()
    {
        $this->trainer_id = '';

        if ($this->search_trainers === '') {
            $this->trainers = [];
            return;
        }

        $this->trainers = Trainer::where('name', 'like', '%' . $this->search_trainers . '%')
            ->orWhere('surname', 'like', '%' . $this->search_trainers . '%')
            ->orWhere('patronymic', 'like', '%' . $this->search_trainers . '%')
            ->limit(10)
            ->get();
    }

    public function setParticipant(Participant $participant)
    {
        $this->participant = $participant;

        $this->name = $participant->name;
        $this->surname = $participant->surname;
        $this->patronymic = $participant->patronymic;
        $this->date_of_birth = $participant->date_of_birth;
        $this->weight = $participant->weight;

        $this->search_clubs = Club::find($participant->club_id)->name;
        $this->search_trainers = Trainer::getTrainerFullName($participant->trainer_id);

        $this->club_id = $participant->club_id;
        $this->trainer_id = $participant->trainer_id;
        $this->rank_id = $participant->rank_id;
        $this->user_id = $participant->user_id;
    }

    public function store()
    {
        $this->validate();

//        $this->user_id = User::factory()->create()->id;//TODO: придумать нормальный механизм регистрации пользователей

        Participant::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->participant->update($this->all());
    }
}
