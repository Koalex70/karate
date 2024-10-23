<div class="cont">
    <div class="tournament">
        <div class="tournament__grid">

            @foreach($levels as $levelKey => $level)
                <div class="tournament__round">
                    @foreach($level as $key => $competition)
                        <div class="tournament__match">
                            <a class="tournament__match__team @if(2 * $key + 1 > ceil($tournament->number_of_participants / pow(2, $levelKey))) text-red-600 @endif"
                               href="#">Lorem ipsum .
                                {{2 * $key + 1}} - {{ceil($tournament->number_of_participants / pow(2, $levelKey))}}</a>
                            <a class="tournament__match__team @if(2 * $key + 2 > ceil($tournament->number_of_participants / pow(2, $levelKey))) text-red-600 @endif"
                               href="#">Lorem ipsum .
                                {{2 * $key + 2}} - {{ceil($tournament->number_of_participants / pow(2, $levelKey))}}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <!-- tournament__round winner -->
            <div class="tournament__round tournament__round--winner">
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Lorem ipsum1.</a>
                </div>
            </div>
        </div>

    </div>
</div>
