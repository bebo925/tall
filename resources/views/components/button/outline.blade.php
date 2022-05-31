@props(['style' => 'default', 'size' => null])

@php
$tag = $attributes->has('href') ? 'a' : 'button';

$sizes = [
'xs' => 'gap-x-1 text-xs px-2.5 py-1.5',
'sm' => 'gap-x-2 text-xs leading-4 px-3 py-2',
null => 'gap-x-2 text-sm px-4 py-2',
'lg' => 'gap-x-2 text-base px-6 py-3',
'xl' => 'gap-x-3 text-lg px-7 py-4'
];

$defaultAttributes = [
'wire:loading.attr' => 'disabled',
'wire:loading.class' => '!cursor-wait',
];

$attributes->has('href')
? $defaultAttributes['type'] = 'button'
: $defaultAttributes['href'] = $attributes->only('href');

$defaultAttributes['class'] = match ($style) {
'default' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-slate-500 text-slate-500 border border-slate-500 hover:bg-slate-50',
'primary' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-primary-500 text-primary-500 border border-primary-500 hover:bg-primary-50 ',
'secondary' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-secondary-500 text-secondary-500 border border-secondary-500 hover:bg-secondary-50',
'warning' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-warning-500 text-warning-500 border border-warning-500 hover:bg-warning-50',
'danger' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-danger-500 text-danger-500 border border-danger-500 hover:bg-danger-50',
};
@endphp

<{{ $tag }} {{ $attributes->class([$sizes[$size]])->merge($defaultAttributes) }}>
    {{$slot}}

    @if ($attributes->has('wire:click'))
    <svg class="animate-spin shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading wire:target="{{ $attributes->wire('click')->value() }}">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    @endif
</{{ $tag }}>
