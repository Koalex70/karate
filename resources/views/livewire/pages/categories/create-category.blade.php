<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать новую категорию') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-between d p-4">
        <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <a href="{{route('categories', ['tournament' => $tournament])}}"
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
                            <label for="name">Название</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   wire:model="form.name"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите название">
                        </div>
                        <div class="text-right">
                            @error('form.name') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="type">Тип мастерства участников</label>
                            <input type="text"
                                   id="type"
                                   name="type"
                                   wire:model="form.type"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите тип мастерства(A, B, C)">
                        </div>
                        <div class="text-right">
                            @error('form.type') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="number_of_participants">Количество участников</label>
                            <input type="number"
                                   id="number_of_participants"
                                   name="number_of_participants"
                                   wire:model="form.number_of_participants"
                                   class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                   placeholder="Введите количество участников">
                        </div>
                        <div class="text-right">
                            @error('form.number_of_participants') <span
                                class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col mb-2">
                            <label for="rank">Карта турнира:</label>
                            <select name="map"
                                    id="map"
                                    class="border rounded bg-gray-800 text-white focus:border-indigo-600"
                                    wire:model="form.map_id">
                                <option value="">Выберите тип турнира</option>
                                @foreach(\App\Models\Map::all() as $map)
                                    <option value="{{$map->id}}">{{$map->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-right">
                            @error('form.map_id') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-2">
                            <div class="mb-2">
                                <p>Возраст участников:</p>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-full flex-col">
                                    <div class="flex items-center">
                                        <label for="age_min" class="mr-1">От:</label>
                                        <input type="number"
                                               id="age_min"
                                               name="age_min"
                                               wire:model="form.age_min"
                                               class="w-full border rounded bg-gray-800 text-white focus:border-indigo-600"
                                               placeholder="Введите минимальный возраст участников">
                                    </div>
                                    <div class="text-left">
                                        @error('form.age_min') <p class="text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                <div class="w-full flex-col">
                                    <div class="flex items-center">
                                        <label for="age_max" class="mr-1 ml-1">До:</label>
                                        <input type="number"
                                               id="age_max"
                                               name="age_max"
                                               wire:model="form.age_max"
                                               class="w-full border rounded bg-gray-800 text-white focus:border-indigo-600"
                                               placeholder="Введите максимальный возраст участников">
                                    </div>
                                    <div class="text-right">
                                        @error('form.age_max') <p class="text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="mb-2">
                                <p>Вес участников:</p>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-full flex-col">
                                    <div class="flex items-center">
                                        <label for="weight_min" class="mr-1">От:</label>
                                        <input type="number"
                                               id="weight_min"
                                               name="weight_min"
                                               wire:model="form.weight_min"
                                               class="w-full border rounded bg-gray-800 text-white focus:border-indigo-600"
                                               placeholder="Введите минимальный вес участников">
                                    </div>
                                    <div class="text-right">
                                        @error('form.weight_min') <p class="text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="w-full flex-col">
                                    <div class="flex items-center">
                                        <label for="weight_max" class="mr-1 ml-1">До:</label>
                                        <input type="number"
                                               id="weight_max"
                                               name="weight_max"
                                               wire:model="form.weight_max"
                                               class="w-full border rounded bg-gray-800 text-white focus:border-indigo-600"
                                               placeholder="Введите максимальный вес участников">
                                    </div>
                                    <div class="text-right">
                                        @error('form.weight_max') <p class="text-red-600">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
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
