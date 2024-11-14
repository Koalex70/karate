<?php

namespace App\Livewire;

use App\Models\Tournament;
use Livewire\Component;

class TatamiTable extends Component
{
    public $tatamis;
    public Tournament $tournament;

    public function mount()
    {
        $this->tatamis = collect(['A', 'B']);
    }

    public function render()
    {
        return view('livewire.pages.views.tatami-table');
    }
}
