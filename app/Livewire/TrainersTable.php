<?php

namespace App\Livewire;

use App\Models\Trainer;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TrainersTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';
    #[Url(history: true)]
    public $sortBy = 'id';
    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $sortDirection = 'ASC';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function setSortBy($sortBy): void
    {
        if ($this->sortBy === $sortBy) {
            $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortBy;
        $this->sortDirection = 'ASC';
    }

    public function delete(Trainer $trainer): void
    {
        $trainer->delete();
    }

    public function render()
    {
        $trainers = Trainer::with('club')
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('surname', 'like', "%{$this->search}%")
            ->orWhere('patronymic', 'like', "%{$this->search}%")
            ->orWhereHas('club', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%");
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.pages.trainers.trainers-table', [
            'trainers' => $trainers
        ]);
    }
}
