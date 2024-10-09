<?php

namespace App\Livewire;

use App\Models\Tournament;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TournamentsTable extends Component
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

    public function delete(Tournament $tournament): void
    {
        //TODO: Доделать механизм удаления внутренних сущностей
        $tournament->delete();
    }

    public function render()
    {
        $tournaments = Tournament::with('map')
        ->where('name', 'like', "%{$this->search}%")
        ->orWhereHas('map', function ($q) {
            $q->where('name', 'LIKE', "%{$this->search}%");
        })
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.pages.tournaments.tournaments-table', [
            'tournaments' => $tournaments
        ]);
    }
}
