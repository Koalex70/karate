<div class="w-screen min-h-screen bg-screen-front flex flex-col" wire:poll.keep-alive.5s>
    <div class="bg-white h-[5vh] flex items-center justify-center text-[4vh]"><p>{{$tournament->name}}</p></div>

    <div class="flex h-[80vh]">
        <div class="flex flex-col m-2 bg-white w-[60vw] p-1">
            <div class="text-[2vh]"><p>Номер поединка:</p></div>
            <div class="flex items-center justify-between">
                <div class="text-[30vh] font-bold">
                    <p>
                        @if(!empty($competitions[0]['competition']))
                            {{sprintf('%03d', $competitions[0]['competition']->fight_number)}}
                        @else
                            000
                        @endif
                    </p>
                </div>
                <div class="flex flex-col ">
                    <div class="font-bold text-[5vh] text-right">Татами №{{$tatami}}</div>
                    <div class="text-[3vh] text-right"><b>Категория:</b>
                        @if(!empty($competitions[0]['category']))
                            {{$competitions[0]['category']->name}}
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="text-[4vh]">
                    Ака (красный):
                </div>
                @if(!empty($competitions[0]['participants'][1]))
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
        </div>

        <div class="flex flex-col w-[40vw]">
            <div class="flex flex-col bg-white mt-2 mb-1 mr-2 h-[40vh] p-1">
                <div class="flex justify-between">
                    <div class="text-[2vh]">
                        Готовятся (Следующие)
                    </div>
                    <div class="text-[2vh]">
                        <b>Категория:</b> @if(!empty($competitions[1]['category']))
                            {{$competitions[1]['category']->name}}
                        @else
                            -
                        @endif
                    </div>
                </div>
                <div class="text-[11vh] font-bold">
                    @if(!empty($competitions[1]['competition']))
                        {{sprintf('%03d', $competitions[1]['competition']->fight_number)}}
                    @else
                        000
                    @endif
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

            <div class="flex flex-col bg-white mr-2 mb-2 h-[40vh] p-1">
                <div class="flex justify-between">
                    <div class="text-[2vh]">
                        Готовятся (Через 1 поединок)
                    </div>
                    <div class="text-[2vh]">
                        <b>Категория:</b> @if(!empty($competitions[2]['category']))
                            {{$competitions[2]['category']->name}}
                        @else
                            -
                        @endif
                    </div>
                </div>
                <div class="text-[11vh] font-bold">
                    @if(!empty($competitions[2]['competition']))
                        {{sprintf('%03d', $competitions[2]['competition']->fight_number)}}
                    @else
                        000
                    @endif
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
    <div class="w-full bg-white flex overflow-hidden">
        <div class="w-full bg-white h-[15vh] flex animate-loop-scroll mr-[6vh]">
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
            <div class="h-[15vh] w-[25vh] flex items-center">
                <img class="inline" src="/images/logo_2.png" alt="...">
            </div>
            <div class="h-[15vh] w-[21vh] flex items-center mr-[3vh] ml-[-3vh]">
                <img class="inline" src="/images/logo_3.png" alt="...">
            </div>
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
            <div class="h-[15vh] w-[25vh] flex items-center">
                <img class="inline" src="/images/logo_2.png" alt="...">
            </div>
            <div class="h-[15vh] w-[21vh] flex items-center mr-[3vh] ml-[-3vh]">
                <img class="inline" src="/images/logo_3.png" alt="...">
            </div>
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
            <div class="h-[15vh] w-[25vh] flex items-center">
                <img class="inline" src="/images/logo_2.png" alt="...">
            </div>
            <div class="h-[15vh] w-[21vh] flex items-center mr-[3vh] ml-[-3vh]">
                <img class="inline" src="/images/logo_3.png" alt="...">
            </div>
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
        </div>
        <div class="w-full bg-white h-[15vh] flex animate-loop-scroll" aria-hidden="true">
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
            <div class="h-[15vh] w-[25vh] flex items-center">
                <img class="inline" src="/images/logo_2.png" alt="...">
            </div>
            <div class="h-[15vh] w-[21vh] flex items-center mr-[3vh] ml-[-3vh]">
                <img class="inline" src="/images/logo_3.png" alt="...">
            </div>
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
            <div class="h-[15vh] w-[25vh] flex items-center">
                <img class="inline" src="/images/logo_2.png" alt="...">
            </div>
            <div class="h-[15vh] w-[21vh] flex items-center mr-[3vh] ml-[-3vh]">
                <img class="inline" src="/images/logo_3.png" alt="...">
            </div>
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
            <div class="h-[15vh] w-[25vh] flex items-center">
                <img class="inline" src="/images/logo_2.png" alt="...">
            </div>
            <div class="h-[15vh] w-[21vh] flex items-center mr-[3vh] ml-[-3vh]">
                <img class="inline" src="/images/logo_3.png" alt="...">
            </div>
            <div class="h-[15vh] w-[13vh] flex items-center mr-[1vh]">
                <img class="inline" src="/images/logo_1.png" alt="...">
            </div>
        </div>
    </div>
</div>
