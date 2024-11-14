<?php

namespace App\Livewire;

use App\Helpers\CategoryNetGenerator;
use App\Models\Category;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Dflydev\DotAccessData\Data;
use Livewire\Attributes\Layout;
use Livewire\Component;

class JudgesScreen extends Component
{
    public $tatami;
    public Tournament $tournament;
    public $competitions = [];
    public $categories;

    public $isWinner1 = false;
    public $isWinner2 = false;

    public function updatingIsWinner1($value)
    {
        if ($value) {
            $this->isWinner1 = true;
            $this->isWinner2 = false;
        } else {
            $this->isWinner1 = false;
        }
    }

    public function updatingIsWinner2($value)
    {
        if ($value) {
            $this->isWinner2 = true;
            $this->isWinner1 = false;
        } else {
            $this->isWinner2 = false;
        }
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

            $clubs = [];
            if (!empty($participants[0])) {
                $clubs[0] = Club::find($participants[0]->club_id);
            }
            if (!empty($participants[1])) {
                $clubs[1] = Club::find($participants[1]->club_id);
            }
            $this->competitions[] = [
                'category' => $category,
                'participants' => $participants,
                'competition' => $competition,
                'clubs' => $clubs
            ];
        }
    }

    public function save()
    {
        $this->dispatch('test');

        if ($this->isWinner1 && $this->isWinner2) {
            return;
        }

        if (!$this->isWinner1 && !$this->isWinner2) {
            return;
        }

        $competition = $this->competitions[0]['competition'];

        $loserId = '';
        if ($this->isWinner1) {
            $competition->winner_id = $this->competitions[0]['participants'][0]->id;
            $loserId = $this->competitions[0]['participants'][1]->id;
        } else {
            $competition->winner_id = $this->competitions[0]['participants'][1]->id;
            $loserId = $this->competitions[0]['participants'][0]->id;
        }
        $competition->is_complete = true;

        $competition->save();

        $category = Category::find($competition->category_id);

        if ($competition->next_competition_id == null) {
            if ($competition->is_final) {
                $category->winner_id = $competition->winner_id;
            } else {
                $category->third_place_id = $competition->winner_id;
            }
            $category->save();

            return redirect()->to(route('views.judges', [
                'tournament' => $this->tournament,
                'tatami' => $this->tatami
            ]));
        }

        $position = Contestant::where('competition_id', $competition->id)->first()->position;
        $position = intval(floor($position / 2)) + CategoryNetGenerator::getNetSize($category->number_of_participants);

        //Отправляем в следующий бой
        Contestant::create([
            'points' => 0,
            'is_winner' => false,
            'position' => $position,
            'competition_id' => $competition->next_competition_id,
            'participant_id' => $competition->winner_id,
        ]);

        $nextCompetition = Competition::find($competition->next_competition_id);

        //Отправляем на битву за 3 место
        if ($nextCompetition->is_final) {
            Contestant::create([
                'points' => 0,
                'is_winner' => false,
                'position' => $position + 2,
                'competition_id' => Competition::where('next_competition_id', null)->where('is_final', false)->where('category_id', $category->id)->first()->id,
                'participant_id' => $loserId,
            ]);
        }

        return redirect()->to(route('views.judges', [
            'tournament' => $this->tournament,
            'tatami' => $this->tatami
        ]));
    }

    #[Layout('layouts.empty')]
    public function render()
    {
        return view('livewire.pages.views.judges-screen');
    }
}
