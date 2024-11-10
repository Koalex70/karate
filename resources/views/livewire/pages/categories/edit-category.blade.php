<div class="cont">
    <div class="tournament mb-2">
        <h3 class="text-white text-center text-xl">Основная турнирная сетка</h3>
        <div class="tournament__grid">

            @foreach($levels as $levelKey => $level)
                <div class="tournament__round">
                    @foreach($level as $key => $competition)
                        {{--                        @if(2 * $key + 1 > ceil($category->number_of_participants / pow(2, $levelKey))) text-red-600 @endif--}}
                        {{--                        @if(2 * $key + 2 > ceil($category->number_of_participants / pow(2, $levelKey))) text-red-600 @endif--}}
                        <div class="tournament__match hover:border-gray-300">
                            <a class="tournament__match__team"
                               @if($levelKey === 0)
                                   href=" {{route('contestants.first-level', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $competition,
                                                'position' => $contestantNumber++,
                                                ])}}"
                               @else
                                   href=" {{route('contestants.edit', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $competition,
                                                'position' => $contestantNumber++,
                                                ])}}"
                                @endif
                            >
                                @if(!empty($contestants[$contestantNumber - 1]))
                                    @if(!empty($competition->fight_number))
                                        {{$competition->fight_number . ' - '}}
                                    @endif {{$contestants[$contestantNumber - 1]['participant']->getFullName()}}
                                @else
                                    {{$contestantNumber - 1}}
                                @endif
                            </a>
                            <a class="tournament__match__team "
                               @if($levelKey === 0)
                                   href=" {{route('contestants.first-level', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $competition,
                                                'position' => $contestantNumber++,
                                                ])}}"
                               @else
                                   href=" {{route('contestants.edit', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $competition,
                                                'position' => $contestantNumber++,
                                                ])}}"
                                @endif
                            >
                                @if(!empty($contestants[$contestantNumber - 1])  )
                                    @if(!empty($competition->fight_number))
                                        {{$competition->fight_number . ' - '}}
                                    @endif {{$contestants[$contestantNumber - 1]['participant']->getFullName()}}
                                @else
                                    {{$contestantNumber - 1}}
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <!-- tournament__round winner -->
            <div class="tournament__round tournament__round--winner">
                <div class="tournament__match">
                    <a class="tournament__match__team" href=" {{route('contestants.final', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $final,
                                                ])}}">
                        @if(!empty($winner)  )
                            {{$winner->getFullName()}}
                        @else
                            FINAL
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="tournament">
        <h3 class="text-white text-center text-xl">Битва за 3 место</h3>
        <div class="tournament__grid">
            <div class="tournament__round">
                <div class="tournament__match hover:border-gray-300">
                    <a class="tournament__match__team "
                       href="@if(!empty($thirdPlaceCompetition)) {{route('contestants.first-level', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $thirdPlaceCompetition,
                                                'position' => $contestantNumber++,
                                                ])}} @else # {{$contestantNumber++}} @endif"
                    >
                        @if(!empty($contestants[$contestantNumber - 1]))
                            @if(!empty($thirdPlaceCompetition->fight_number))
                                {{$thirdPlaceCompetition->fight_number . ' - '}}
                            @endif {{$contestants[$contestantNumber - 1]['participant']->getFullName()}}
                        @else
                            {{$contestantNumber - 1}}
                        @endif
                    </a>
                    <a class="tournament__match__team "
                       href="@if(!empty($thirdPlaceCompetition)) {{route('contestants.first-level', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $thirdPlaceCompetition,
                                                'position' => $contestantNumber++,
                                                ])}} @else # {{$contestantNumber++}} @endif"
                    >
                        @if(!empty($contestants[$contestantNumber - 1]))
                            @if(!empty($thirdPlaceCompetition->fight_number))
                                {{$thirdPlaceCompetition->fight_number . ' - '}}
                            @endif {{$contestants[$contestantNumber - 1]['participant']->getFullName()}}
                        @else
                            {{$contestantNumber - 1}}
                        @endif
                    </a>
                </div>
            </div>
            <div class="tournament__round tournament__round--winner">
                <div class="tournament__match">
                    <a class="tournament__match__team" href=" {{route('contestants.final', [
                                                'tournament' => $tournament,
                                                'category' => $category,
                                                'competition' => $thirdPlaceCompetition,
                                                ])}}">
                        @if(!empty($thirdPlace))
                            {{$thirdPlace->getFullName()}}
                        @else
                            FINAL
                        @endif</a>
                </div>
            </div>
        </div>
    </div>
</div>
