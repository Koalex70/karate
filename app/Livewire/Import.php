<?php

namespace App\Livewire;

use App\Imports\ParticipantsImport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    public function mount()
    {
        Excel::import(new ParticipantsImport, 'list.xlsx');
    }
    public function render()
    {
        return view('livewire.import');
    }
}
