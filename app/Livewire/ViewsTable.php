<?php

namespace App\Livewire;

use App\Models\Tournament;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ViewsTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $perPage = 10;

    public function render()
    {
        return view('livewire.pages.views.views-table', [
            'tournaments' => Tournament::paginate($this->perPage)
        ]);
    }
}
