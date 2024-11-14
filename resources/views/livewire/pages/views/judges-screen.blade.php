<div class="w-screen min-h-screen bg-screen-front flex flex-col">
    <div class="bg-white h-[4vh] flex items-center justify-center text-[3vh]"><p>{{$tournament->name}}</p></div>

    <div class="flex h-[96vh]">
        <div class="flex flex-col m-2 bg-white w-[60vw] p-1">
            <div class="w-[60vw]">
                <div class="flex justify-between">
                    <div class="text-[4vh] flex-col">
                        <p>Номер поединка:</p>
                        <div class="text-[20vh] font-bold">
                            <p>
                                @if(!empty($competitions[0]['competition'])) {{sprintf('%03d', $competitions[0]['competition']->fight_number)}} @else 000 @endif
                            </p>
                        </div>
                    </div>
                    <div class="font-bold text-[5vh] text-right">Татами №{{$tatami}}</div>
                    <div class="text-[3vh] text-right max-w-[25vw]">
                        <b>Категория:</b>@if(!empty($competitions[0]['category'])) {{$competitions[0]['category']->name}} @else - @endif</div>
                </div>
            </div>
            <div class="text-right mr-1 text-[5vh]">
                <p>Победитель:</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="text-[4vh]">
                        Ака (красный):
                    </div>
                    @if(!empty($competitions[0]['participants'][0]))
                    <div class="flex flex-col">
                        <div
                            class="font-bold text-[6vh]">{{$competitions[0]['participants'][0]->surname . ' '}} {{substr($competitions[0]['participants'][0]->name,0 ,2) . '.'}}
                            @if(!empty($competitions[0]['participants'][0]->patronymic))
                                {{substr($competitions[0]['participants'][0]->patronymic, 0, 2) . '.'}}
                            @endif</div>
                        <div class="text-[4vh]">Клуб: {{$competitions[0]['clubs'][0]->name}}</div>
                    </div>
                    @else
                        <div class="text-[4vh]">
                            <p>Противник еще определяется</p>
                        </div>
                    @endif
                </div>
                <div class="mr-[6vw]">
                    <input type="checkbox" class="w-[60px] h-[60px]" wire:model.live.debounce.1="isWinner1">
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="text-[4vh]">
                        Широ (белый):
                    </div>
                    @if(!empty($competitions[0]['participants'][1]))
                    <div class="flex flex-col">
                        <div
                            class="font-bold text-[6vh]">{{$competitions[0]['participants'][1]->surname . ' '}} {{substr($competitions[0]['participants'][1]->name,0 ,2) . '.'}}
                            @if(!empty($competitions[0]['participants'][1]->patronymic))
                                {{substr($competitions[0]['participants'][1]->patronymic, 0, 2) . '.'}}
                            @endif</div>
                        <div class="text-[4vh]">Клуб: {{$competitions[0]['clubs'][1]->name}}</div>
                    </div>
                    @else
                        <div class="text-[4vh]">
                            <p>Противник еще определяется</p>
                        </div>
                    @endif
                </div>
                <div class="mr-[6vw]">
                    <input type="checkbox" class="w-[60px] h-[60px]" wire:model.live.debounce.1="isWinner2">
                </div>
            </div>
            <div class="w-full flex justify-end">
                <button class="rounded bg-[#D9D9D9] w-[25vh] h-[100px] text-[3vh] mr-[3vh]" wire:click="save()">
                    Следующий бой
                </button>
            </div>
        </div>

        <div class="flex flex-col w-[40vw]">
            <div class="flex flex-col bg-white mt-2 mb-1 mr-2 h-[48vh] p-1">
                <div class="flex justify-between">
                    <div class="text-[2vh]">
                        Готовятся (Следующие)
                    </div>
                    <div class="text-[2vh]">
                        <b>Категория:</b> @if(!empty($competitions[1]['category'])) {{$competitions[1]['category']->name}} @else - @endif
                    </div>
                </div>
                <div class="text-[11vh] font-bold">
                    @if(!empty($competitions[1]['competition'])) {{sprintf('%03d', $competitions[1]['competition']->fight_number)}} @else 000 @endif
                </div>
                <div class="flex items-center">
                    <div class="text-[3vh]">
                        Ака (красный):
                    </div>
                    @if(!empty($competitions[1]['participants'][0]))
                    <div class="flex flex-col">
                        <div
                            class="font-bold text-[4vh]">{{$competitions[1]['participants'][0]->surname . ' '}} {{substr($competitions[1]['participants'][0]->name,0 ,2) . '.'}}
                            @if(!empty($competitions[1]['participants'][0]->patronymic))
                                {{substr($competitions[1]['participants'][0]->patronymic, 0, 2) . '.'}}
                            @endif</div>
                        <div class="text-[2vh]">Клуб: {{$competitions[1]['clubs'][0]->name}}</div>
                    </div>
                    @else
                        <div class="text-[4vh]">
                            <p>Противник еще определяется</p>
                        </div>
                    @endif
                </div>
                <div class="flex items-center">
                    <div class="text-[3vh]">
                        Широ (белый):
                    </div>
                    @if(!empty($competitions[1]['participants'][1]))
                        <div class="flex flex-col">
                            <div
                                class="font-bold text-[4vh]">{{$competitions[1]['participants'][1]->surname . ' '}} {{substr($competitions[1]['participants'][1]->name,0 ,2) . '.'}}
                                @if(!empty($competitions[1]['participants'][1]->patronymic))
                                    {{substr($competitions[1]['participants'][1]->patronymic, 0, 2) . '.'}}
                                @endif</div>
                            <div class="text-[2vh]">Клуб: {{$competitions[1]['clubs'][1]->name}}</div>
                        </div>
                    @else
                        <div class="text-[4vh]">
                            <p>Противник еще определяется</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col bg-white mr-2 mb-2 h-[48vh] p-1">
                <div class="flex justify-between">
                    <div class="text-[2vh]">
                        Готовятся (Через 1 поединок)
                    </div>
                    <div class="text-[2vh]">
                        <b>Категория:</b> @if(!empty($competitions[2]['category'])) {{$competitions[2]['category']->name}} @else - @endif
                    </div>
                </div>
                <div class="text-[11vh] font-bold">
                    @if(!empty($competitions[2]['competition'])) {{sprintf('%03d', $competitions[2]['competition']->fight_number)}} @else 000 @endif
                </div>
                <div class="flex items-center">
                    <div class="text-[3vh]">
                        Ака (красный):
                    </div>
                    @if(!empty($competitions[2]['participants'][0]))
                        <div class="flex flex-col">
                            <div
                                class="font-bold text-[4vh]">{{$competitions[2]['participants'][0]->surname . ' '}} {{substr($competitions[2]['participants'][0]->name,0 ,2) . '.'}}
                                @if(!empty($competitions[2]['participants'][0]->patronymic))
                                    {{substr($competitions[2]['participants'][0]->patronymic, 0, 2) . '.'}}
                                @endif</div>
                            <div class="text-[2vh]">Клуб: {{$competitions[2]['clubs'][0]->name}}</div>
                        </div>
                    @else
                        <div class="text-[4vh]">
                            <p>Противник еще определяется</p>
                        </div>
                    @endif
                </div>
                <div class="flex items-center">
                    <div class="text-[3vh]">
                        Широ (белый):
                    </div>
                    @if(!empty($competitions[2]['participants'][1]))
                        <div class="flex flex-col">
                            <div
                                class="font-bold text-[4vh]">{{$competitions[2]['participants'][1]->surname . ' '}} {{substr($competitions[2]['participants'][1]->name,0 ,2) . '.'}}
                                @if(!empty($competitions[2]['participants'][1]->patronymic))
                                    {{substr($competitions[2]['participants'][1]->patronymic, 0, 2) . '.'}}
                                @endif</div>
                            <div class="text-[2vh]">Клуб: {{$competitions[2]['clubs'][1]->name}}</div>
                        </div>
                    @else
                        <div class="text-[4vh]">
                            <p>Противник еще определяется</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
