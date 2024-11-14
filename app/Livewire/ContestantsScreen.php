<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class ContestantsScreen extends Component
{
    public $tatami;
    public Tournament $tournament;
    public $competitions = [];
    public $categories;

    #[On('test')]
    public function test()
    {
        return redirect()->to(route('views.contestants', [
            'tournament' => $this->tournament,
            'tatami' => $this->tatami,
        ]));
    }

    public function mount()
    {
        $this->tatami = \Route::current()->parameter('tatami');
        $this->categories = Category::where('tournament_id', $this->tournament->id)
            ->where('tatami', $this->tatami)
            ->get();


        $competitions = Competition::whereIn('category_id', $this->categories->pluck('id')->all())
            ->where('is_complete', false)
            ->get();


        $competitions = $competitions->sortBy('fight_number')->slice(0, 3)->values()->all();
        foreach ($competitions as $competition) {
            $category = Category::find($competition->category_id);
            $contestants = Contestant::where('competition_id', $competition->id)->get();

            $participantIds = [];
            foreach ($contestants as $contestant) {
                $participantIds[] = $contestant->participant_id;
            }
            $participants = Participant::whereIn('id', $participantIds)->get()->all();
            $clubs[0] = Club::find($participants[0]->club_id);
            $clubs[1] = Club::find($participants[1]->club_id);
            $this->competitions[] = [
                'category' => $category,
                'participants' => $participants,
                'competition' => $competition,
                'clubs' => $clubs
            ];
        }
    }

    #[Layout('layouts.empty')]
    public function render()
    {
        return view('livewire.pages.views.contestants-screen');
    }
}
