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
</div>
