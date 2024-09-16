<?php

namespace App\Livewire;

use App\Models\Federation;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class FederationsTable extends Component
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

    public function delete(Federation $federation): void
    {
        $federation->delete();
    }

    public function render()
    {
        return view('livewire.pages.federations.federations-table',
            [
                'federations' => Federation::search($this->search)
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate($this->perPage)
            ]);
    }
}
