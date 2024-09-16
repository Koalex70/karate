<?php

namespace App\Livewire;

use App\Models\Participant;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ParticipantsTable extends Component
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

    public function delete(Participant $participant): void
    {
        $participant->delete();
    }

    public function render()
    {
        $participants = Participant::with('club')
            ->with('trainer')
            ->with('rank')
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('surname', 'like', "%{$this->search}%")
            ->orWhere('patronymic', 'like', "%{$this->search}%")
            ->orWhereHas('club', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%");
            })
            ->orWhereHas('trainer', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('surname', 'LIKE', "%{$this->search}%");
            })
            ->orWhereHas('rank', function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%");
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);


        return view('livewire.pages.participants.participants-table', [
            'participants' => $participants
        ]);
    }
}
