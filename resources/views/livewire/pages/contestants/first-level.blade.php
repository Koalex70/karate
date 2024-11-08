<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать нового участника') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-between d p-4">
        <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <a href="{{route('categories.edit', ['tournament' => $tournament, 'category' => $category])}}"
                   class="bg-blue-600 rounded p-3 border-gray-300 text-white">
                    Вернуться назад
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-center">
                    <form wire:submit="save" class="w-full">
                        <div class="flex flex-col mb-2">
                            <label for="participant">Участник</label>
                            <input type="text"
                                   wire:model.live="form.search_participants"
                                   name="participant"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   id="participant"
                                   placeholder="Введите ФИО Участников">
                            @if($form->participants)
                                <div class="relative">
                                    <div class="absolute z-10 border">
                                        @foreach($form->participants as $key => $participant)
                                            <div class="w-full bg-gray-800"
                                                 wire:key="{{$key}}"
                                                 wire:click="setParticipant({{$participant->id}})">
                                                {{$participant->getFullname()}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="text-right">
                            @error('form.participant_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Татами</label>
                            <input type="text"
                                   id="tatami"
                                   name="tatami"
                                   wire:model="tatami"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите номер татами">
                        </div>
                        <div class="text-right">
                            @error('tatami') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit"
                                    class="rounded dark:bg-indigo-600 p-2">Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>