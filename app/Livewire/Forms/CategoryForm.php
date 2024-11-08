<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Tournament;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?Category $category;
    public Tournament $tournament;

    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $map_id = '';
    #[Validate('required')]
    public $tournament_id = '';
    #[Validate('required|numeric|min:2')]
    public $number_of_participants;
    #[Validate('nullable|numeric|min:0')]
    public $age_min;
    #[Validate('nullable|numeric|min:0|max:100')]
    public $age_max;
    #[Validate('nullable|numeric|min:0')]
    public $weight_min;
    #[Validate('nullable|numeric|max:200')]
    public $weight_max;

    public function setCategory(Category $category): void
    {
        $this->name = $category->name;
        $this->number_of_participants = $category->number_of_participants;
        $this->map_id = $category->map_id;

        $this->age_min = $category->age_min ?? null;
        $this->age_max = $category->age_max ?? null;
        $this->weight_min = $category->weight_min ?? null;
        $this->weight_max = $category->weight_max ?? null;
    }

    public function store(Tournament $tournament)
    {
        $this->tournament_id = $tournament->id;
        $this->validate();

        $category = Category::create($this->all());
        $category->generateCategoryNet();

        return $category;
    }

    public function update(): void
    {
        $this->validate();

        $this->category->update($this->all());
    }
}
