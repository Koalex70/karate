<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Участники') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-between d p-4">
        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                         fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                    placeholder="Search"
                    required="">
            </div>
        </div>
        <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <a href="{{route('participants.create')}}"
                   class="bg-blue-600 rounded p-3 border-gray-300 text-white">
                    Создать
                </a>
            </div>
        </div>
    </div>
    <section class="py-3">
        <div class="bg-white dark:bg-gray-800">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-100">
                    <thead class="text-sm text-gray-400 uppercase bg-gray-50 bg-gray-800">
                    <tr>
                        @include('livewire.includes.table-head', [
                            'name' => 'id',
                            'displayName' => 'ID'
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'name',
                            'displayName' => 'NAME'
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'surname',
                            'displayName' => 'SURNAME'
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'patronymic',
                            'displayName' => 'PATRONYMIC'
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'date_of_birth',
                            'displayName' => 'DATE OF BIRTH'
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'weight',
                            'displayName' => 'WEIGHT'
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'trainer_id',
                            'displayName' => 'TRAINER',
                            'isSortable' => false
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'rank_id',
                            'displayName' => 'RANK',
                            'isSortable' => false
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'club_id',
                            'displayName' => 'CLUB',
                            'isSortable' => false
                        ])
                        @include('livewire.includes.table-head', [
                            'name' => 'created_at',
                            'displayName' => 'CREATED_AT'
                        ])
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($participants as $participant)

                        <tr wire:key="{{$participant->id}}" class="border-b dark:border-gray-700 ">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->id}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->name}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->surname}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->patronymic}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->date_of_birth}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->weight}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-blue-400 hover:text-gray-400">
                                <a href="{{ route('trainers', ['search' => $participant->trainer->name]) }}">{{$participant->trainer->name}}</a>
                            </td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->rank->name}}</td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-blue-400 hover:text-gray-400">
                                <a href="{{ route('clubs', ['search' => $participant->club->name]) }}">{{$participant->club->name}}</a>
                            </td>
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$participant->created_at}}</td>
                            <td class="flex items-center justify-center">
                                <a href="{{route('participants.edit', ['participant' => $participant])}}">
                                    <div class="px-2 py-1 bg-blue-600 rounded mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                        </svg>
                                    </div>
                                </a>
                                <button
                                    wire:click="delete({{$participant->id}})"
                                    wire:confirm="Вы действительно хотите удалить участника: {{$participant->surname}} {{$participant->name}} {{$participant->patronymic}}?"
                                    class="px-3 py-1 mb-4 mt-4 bg-red-500 text-white rounded">X
                                </button>
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
            {{$participants->links()}}
        </div>
    </section>
</div>
