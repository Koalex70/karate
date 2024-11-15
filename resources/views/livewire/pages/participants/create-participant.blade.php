<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать нового участника') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-between d p-4">
        <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <a href="{{route('participants')}}"
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
                            <label for="name">Имя</label>
                            <input type="text"
                                   wire:model="form.name"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите имя">
                        </div>
                        <div class="text-right">
                            @error('form.name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Фамилия</label>
                            <input type="text"
                                   wire:model="form.surname"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите фамилию">
                        </div>
                        <div class="text-right">
                            @error('form.surname') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Отчество</label>
                            <input type="text"
                                   wire:model="form.patronymic"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите отчество">
                        </div>
                        <div class="text-right">
                            @error('form.patronymic') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Дата рождения</label>
                            <input type="date"
                                   wire:model="form.date_of_birth"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите дату рождения">
                        </div>
                        <div class="text-right">
                            @error('form.date_of_birth') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Вес</label>
                            <input type="text"
                                   wire:model="form.weight"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите вес">
                        </div>
                        <div class="text-right">
                            @error('form.weight') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="club">Клуб</label>
                            <input type="text"
                                   wire:model.live="form.search_clubs"
                                   name="club"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   id="club"
                                   placeholder="Введите название клуба">
                            @if($form->clubs)
                                <div class="relative">
                                    <div class="absolute z-10 border">
                                        @foreach($form->clubs as $key => $club)
                                            <div class="w-full bg-gray-800"
                                                 wire:key="{{$key}}"
                                                 wire:click="setClub({{$club->id}}, '{{$club->name}}')">
                                                {{$club->name}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="text-right">
                            @error('form.club_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="trainer">Тренер</label>
                            <input type="text"
                                   wire:model.live="form.search_trainers"
                                   name="trainer"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   id="trainer"
                                   placeholder="Введите ФИО тренера">
                            @if($form->trainers)
                                <div class="relative">
                                    <div class="absolute z-10 border">
                                        @foreach($form->trainers as $key => $trainer)
                                            <div class="w-full bg-gray-800"
                                                 wire:key="{{$key}}"
                                                 wire:click="setTrainer({{$trainer->id}}, '{{$trainer->surname}} {{$trainer->name}} {{$trainer->patronymic}}')">
                                                {{$trainer->surname}} {{$trainer->name}} {{$trainer->patronymic}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
{{--                        <div class="flex flex-col mb-2">--}}
{{--                            <label for="trainer">Тренер</label>--}}
{{--                            <select name="trainer" id="trainer"--}}
{{--                                    class="border rounded bg-gray-800 text-white focus:border-indigo-600"--}}
{{--                                    wire:model="form.trainer_id">--}}
{{--                                <option value="">Выберите Тренера</option>--}}
{{--                                @foreach(\App\Models\Trainer::all() as $trainer)--}}
{{--                                    <option--}}
{{--                                        value="{{$trainer->id}}">{{$trainer->surname}} {{$trainer->name}} {{$trainer->patronymic}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="text-right">
                            @error('form.trainer_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="rank">Ранг</label>
                            <select name="rank" id="rank"
                                    class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                    wire:model="form.rank_id">
                                <option value="">Выберите Ранг</option>
                                @foreach(\App\Models\Rank::all() as $rank)
                                    <option value="{{$rank->id}}">{{$rank->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-right">
                            @error('form.rank_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit"
                                    class="rounded dark:bg-indigo-600 p-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
