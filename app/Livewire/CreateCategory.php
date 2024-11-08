<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Tournament;
use Livewire\Component;

class CreateCategory extends Component
{
    public CategoryForm $form;
    public Tournament $tournament;

    public function mount(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    public function save()
    {
        $category = $this->form->store($this->tournament);

        return redirect()->to(route('categories.edit', [
            'tournament' => $this->tournament,
            'category' => $category
        ]));
    }

    public function render()
    {
        return view('livewire.pages.categories.create-category');
    }
}
