<?php

namespace App\Livewire;

use App\Helpers\CategoryNetGenerator;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Contestant;
use App\Models\Participant;
use App\Models\Tournament;
use Livewire\Component;
use function Laravel\Prompts\form;

class EditCategory extends Component
{
    public Tournament $tournament;
    public Category $category;

    public $levels;
    public $netSize;
    public $contestants;

    public $contestantNumber = 0;
    public Competition $final;

    public $winner;

    public ?Competition $thirdPlaceCompetition;

    public $thirdPlace;

    public $competitions;

    public $winners = [];

    public function render()
    {
        return view('livewire.pages.categories.edit-category');
    }

    public function mount(Tournament $tournament, Category $category)
    {
        $this->tournament = $tournament;
        $this->category = $category;

        if ($this->category->number_of_participants === 3) {
            $this->circle();
        } else {
            $this->olimp();
        }


    }

    public function olimp()
    {
        $this->levels = $this->category->getCategoryNet();
        $this->final = Competition::where('is_final', true)->where('category_id', $this->category->id)->first();

        if (!empty($this->category->winner_id)) {
            $this->winner = Participant::find($this->category->winner_id);
        }

        $competitions = [];
        foreach ($this->category->competitions as $competition) {
            $competitions[] = $competition->contestants->toArray();
        }

        $competitions = array_filter($competitions);

        $this->contestants = [];
        foreach ($competitions as $competition) {
            foreach ($competition as $contestant) {
                $this->contestants[$contestant['position']] = $contestant;
                $this->contestants[$contestant['position']]['participant'] = Participant::find($contestant['participant_id']);

            }
        }

        $this->netSize = CategoryNetGenerator::getNetSize($this->category->number_of_participants);

        if ($this->category->number_of_participants >= 4) {
            $this->thirdPlaceCompetition = Competition::where('next_competition_id', null)
                ->where('is_final', false)
                ->where('category_id', $this->category->id)
                ->first();
        }

        if (!empty($this->category->third_place_id)) {
            $this->thirdPlace = Participant::find($this->category->third_place_id);
        }
    }

    public function circle()
    {
        $this->competitions = Competition::where('category_id', $this->category->id)->get();

        $competitions = [];
        foreach ($this->competitions as $competition) {
            $competitions[] = $competition->contestants->toArray();
        }

        $competitions = array_filter($competitions);

        $this->contestants = [];
        foreach ($competitions as $competition) {
            foreach ($competition as $contestant) {
                $this->contestants[$contestant['position']] = $contestant;
                $this->contestants[$contestant['position']]['participant'] = Participant::find($contestant['participant_id']);

            }
        }

        foreach ($this->competitions as $competition) {
            if ($competition->winner_id) {
                $this->winners[$competition->id] = Participant::find($competition->winner_id);
            }
        }
    }
}
