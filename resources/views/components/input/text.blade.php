<div class="relative rounded-md shadow-sm">
    @isset($prefix)
    <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none text-secondary-400">
        <span class="pl-1 flex items-center self-center">
            {{ $prefix }}
        </span>
    </div>
    @endisset

    <input {{ $attributes->class(['pl-10' => isset($prefix), 'pr-10' => isset($suffix)])
    ->merge([ 'type' => 'text', 'autocomplete' => 'off', 'class' => 'placeholder-secondary-400 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm' ]) }} />

    @isset($suffix)
    <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none text-secondary-400">
        <span class="pr-1 flex items-center justify-center">
            {{ $suffix }}
        </span>
    </div>
    @endisset

    @if ($attributes->has('wire:target'))
    <div wire:loading {{$attributes->wire('target')}} class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none text-secondary-400">
        <span class="pr-1 flex items-center justify-center">
            <svg class="animate-spin shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
    </div>
    @endif
</div>
