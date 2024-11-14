<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Выберите турнир') }}
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
                        @include('livewire.includes.table-head', [
                            'name' => 'created_at',
                            'displayName' => 'CREATED_AT',
                            'isSortable' => false
                        ])
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tournaments as $tournament)
                        <tr wire:key="{{$tournament->id}}" class="border-b dark:border-gray-700 ">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$tournament->id}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$tournament->name}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$tournament->created_at}}</td>
                            <td class="flex items-center justify-center">
                                <a href="{{route('views.tatami', ['tournament' => $tournament])}}"
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-4 px-3">
            <div class="flex ">
                <div class="flex space-x-4 items-center mb-3">
                    <label class="w-48 text-sm font-medium text-gray-400">На странице</label>
                    <select
                        wire:model.live='perPage'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            {{$tournaments->links()}}
        </div>
    </section>
</div>
