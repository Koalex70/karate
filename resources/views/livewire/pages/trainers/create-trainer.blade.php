<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать нового тренера') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-between d p-4">
        <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <a href="{{route('trainers')}}" class="bg-blue-600 rounded p-3 border-gray-300 text-white">
                    Вернуться назад
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-center">
                    <form wire:submit="save">
                        <div class="flex flex-col mb-2">
                            <label for="name">Введите Имя: </label>
                            <input type="text" wire:model="form.name"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600">
                        </div>
                        <div class="text-right">
                            @error('form.name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Введите фамилию: </label>
                            <input type="text" wire:model="form.surname"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600">
                        </div>
                        <div class="text-right">
                            @error('form.surname') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="name">Введите отчество: </label>
                            <input type="text" wire:model="form.patronymic"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600">
                        </div>
                        <div class="text-right">
                            @error('form.patronymic') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="club">Клуб</label>
                            <select name="club" id="club"
                                    class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                    wire:model="form.club_id">
                                <option value="">Выберите Клуб</option>
                                @foreach(\App\Models\Club::all() as $club)
                                    <option value="{{$club->id}}">{{$club->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-right">
                            @error('form.club_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="rounded dark:bg-indigo-600 p-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>