@props(['style' => 'default'])

@php
$tag = $attributes->has('href') ? 'a' : 'button';

$defaultAttributes = [
'wire:loading.attr' => 'disabled',
'wire:loading.class' => '!cursor-wait',
];

$attributes->has('href')
? $defaultAttributes['type'] = 'button'
: $defaultAttributes['href'] = $attributes->only('href');

$defaultAttributes['class'] = match ($style) {
'default' => 'focus:outline-none inline-flex justify-center items-center transition-all ease-in duration-100 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-slate-600 text-slate-600 hover:bg-slate-100',
'primary' => 'focus:outline-none inline-flex justify-center items-center transition-all ease-in duration-100 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-primary-600 text-primary-600 hover:bg-primary-100',
'secondary' => 'focus:outline-none inline-flex justify-center items-center transition-all ease-in duration-100 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-secondary-600 text-secondary-600 hover:bg-secondary-100',
'warning' => 'focus:outline-none inline-flex justify-center items-center transition-all ease-in duration-100 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-warning-600 text-warning-600 hover:bg-warning-100',
};
@endphp

<{{ $tag }} {{ $attributes->merge($defaultAttributes) }}>
    {{$slot}}

    @if ($attributes->has('wire:click'))
    <svg class="animate-spin shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading wire:target="{{ $attributes->wire('click')->value() }}">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    @endif
</{{ $tag }}>
