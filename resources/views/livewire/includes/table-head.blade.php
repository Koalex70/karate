<th scope="col" @if($isSortable ?? true) wire:click="setSortBy('{{ $name }}') @endif">
    <div class="flex justify-center">
        <button class="flex items-center justify-center">
            {{$displayName}}
            @if($isSortable ?? true)
                @if($sortBy !== $name)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="ml-1 size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                    </svg>
                @elseif($sortDirection === 'ASC')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="ml-1 size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5"/>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         class="ml-1 size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                @endif
            @endif
        </button>
    </div>
</th>