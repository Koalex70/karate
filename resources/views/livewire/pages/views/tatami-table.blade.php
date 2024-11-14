<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Выберите татами') }}
        </h2>
    </x-slot>
    <section class="py-3">
        <div class="bg-white dark:bg-gray-800">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-100">
                    <thead class="text-sm text-gray-400 uppercase bg-gray-50 bg-gray-800">
                    <tr>
                        @include('livewire.includes.table-head', [
                            'name' => 'id',
                            'displayName' => 'ID',
                            'isSortable' => false
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'name',
                            'displayName' => 'NAME',
                            'isSortable' => false
                        ])
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tatamis as $key => $tatami)
                        <tr wire:key="{{$key}}" class="border-b dark:border-gray-700 ">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$key}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$tatami}}</td>
                            <td class="flex items-center justify-center">
                                <a href="{{route('views.contestants', ['tournament' => $tournament, 'tatami' => $tatami])}}"
                                   class="px-3 py-1 mb-4 mt-4">
                                    <div class="px-2 py-1 bg-blue-600 rounded mr-2">
                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="size-5">
                                            <title/>
                                            <g data-name="Layer 2" id="Layer_2">
                                                <path
                                                    d="M22,9a1,1,0,0,0,0,1.42l4.6,4.6H3.06a1,1,0,1,0,0,2H26.58L22,21.59A1,1,0,0,0,22,23a1,1,0,0,0,1.41,0l6.36-6.36a.88.88,0,0,0,0-1.27L23.42,9A1,1,0,0,0,22,9Z"/>
                                            </g>
                                        </svg>

                                    </div>
                                </a>
                                <a href="{{route('views.judges', ['tournament' => $tournament, 'tatami' => $tatami])}}"
                                   class="px-3 py-1 mb-4 mt-4">
                                    <div class="px-2 py-1 bg-blue-600 rounded mr-2">
                                        <svg id='Legal_Hammer_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                            <g transform="matrix(0.83 0 0 0.83 12 12)" >
                                                <g style="" >
                                                    <g transform="matrix(1 0 0 1 5.28 2.56)" >
                                                        <path style="stroke: rgb(0,0,0); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-17.28, -14.56)" d="M 13.54 8.58 L 22.869999999999997 17.369999999999997 C 23.37984277728979 17.881285724414813 23.37984277728979 18.708714275585184 22.869999999999997 19.22 L 21.939999999999998 20.15 C 21.428714275585182 20.659842777289793 20.60128572441481 20.659842777289793 20.089999999999996 20.15 L 11.3 10.82" stroke-linecap="round" />
                                                    </g>
                                                    <g transform="matrix(1 0 0 1 -1.76 -4.49)" >
                                                        <path style="stroke: rgb(0,0,0); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-10.24, -7.51)" d="M 3.85 8.54 C 6.963832249916846 6.810866137822039 9.530866137822047 4.243832249916836 11.260000000000005 1.1299999999999883 C 11.771285724414813 0.6201572227102049 12.598714275585186 0.620157222710205 13.11 1.1299999999999992 L 16.619999999999997 4.639999999999999 C 17.131000400320318 5.15470910922277 17.131000400320318 5.985290890777227 16.619999999999997 6.499999999999999 C 13.474433226893911 8.182142382715858 10.896388742640559 10.756707724615293 9.209999999999994 13.900000000000006 C 8.698714275585184 14.409842777289793 7.871285724414811 14.409842777289793 7.359999999999998 13.899999999999999 L 3.85 10.39 C 3.340157222710205 9.878714275585187 3.3401572227102045 9.051285724414813 3.8499999999999996 8.54 Z" stroke-linecap="round" />
                                                    </g>
                                                    <g transform="matrix(1 0 0 1 -4.5 9.25)" >
                                                        <path style="stroke: rgb(0,0,0); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-7.5, -21.25)" d="M 12.75 20.75 L 12.75 20.75 C 12.75 19.92157287525381 12.07842712474619 19.25 11.25 19.25 L 3.75 19.25 C 2.9215728752538097 19.25 2.25 19.92157287525381 2.25 20.75 L 2.25 20.75 L 2.25 23.25 L 12.75 23.25 Z" stroke-linecap="round" />
                                                    </g>
                                                    <g transform="matrix(1 0 0 1 -4.5 11.25)" >
                                                        <line style="stroke: rgb(0,0,0); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x1="-6.75" y1="0" x2="6.75" y2="0" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
