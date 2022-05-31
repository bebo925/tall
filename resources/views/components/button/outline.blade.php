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
'default' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 border text-slate-500 hover:bg-slate-100 ring-slate-200 dark:ring-slate-600 dark:border-slate-500 dark:hover:bg-slate-700 dark:ring-offset-slate-800 dark:text-slate-400',
'primary' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-primary-500 text-white bg-primary-500 hover:bg-primary-600 hover:ring-primary-600 dark:ring-offset-slate-800 dark:bg-primary-700 dark:ring-primary-700 dark:hover:bg-primary-600 dark:hover:ring-primary-600',
'secondary' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-primary-500 text-white bg-secondary-500 hover:bg-secondary-600 hover:ring-secondary-600 dark:ring-offset-slate-800 dark:bg-secondary-700 dark:ring-secondary-700 dark:hover:bg-secondary-600 dark:hover:ring-secondary-600',
'warning' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-warning-500 text-white bg-warning-500 hover:bg-warning-600 hover:ring-warning-600 dark:ring-offset-slate-800 dark:bg-warning-700 dark:ring-warning-700 dark:hover:bg-warning-600 dark:hover:ring-warning-600',
'danger' => 'outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-4 py-2 ring-primary-500 text-white bg-danger-500 hover:bg-danger-600 hover:ring-danger-600 dark:ring-offset-slate-800 dark:bg-danger-700 dark:ring-danger-700 dark:hover:bg-danger-600 dark:hover:ring-danger-600',
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
