<?php

namespace App\Livewire;

use App\Livewire\Forms\ContestantForm;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Livewire\Component;

class EditCircle extends Component
{
    public Tournament $tournament;
    public Category $category;
    public Competition $competition;

    public $participants;
    public $participant_id;

    public function mount()
    {
        if ($this->competition->winner_id) {
            $this->participant_id = $this->competition->winner_id;
        }
        $contestants = Contestant::where('competition_id', $this->competition->id)->get();

        $participantIds = $contestants->map(function ($item) {
            return $item->participant_id;
        });

        $this->participants = Participant::whereIn('id', $participantIds)->get();
    }

    public function save()
    {
        if (!empty($this->participant_id)) {
            $this->competition->winner_id = $this->participant_id;
            $this->competition->is_complete = true;
            $this->competition->save();
        }

        return redirect()->to(route('categories.edit', [
            'tournament' => $this->tournament,
            'category' => $this->category,
        ]));
    }
    public function render()
    {
        return view('livewire.edit-circle');
    }
}
