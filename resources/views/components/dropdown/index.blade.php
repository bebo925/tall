@props(['align' => 'right', 'height' => 'max-h-60'])
@php
$alignments = [
'right' => 'origin-top-right right-0',
'left' => 'origin-top-left left-0',
'top-right' => 'origin-top-right right-0 bottom-0',
'top-left' => 'origin-top-left left-0 bottom-0',
];
@endphp
<div class="relative inline-block text-left" x-data="{
    open: false,
    toggle: function(){
        this.open = !this.open;
    }
}" x-on:click.outside="open=false" x-on:keydown.escape.window="open = false" {{ $attributes->only('wire:key') }}>
    <div class="cursor-pointer focus:outline-none" x-on:click="toggle">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" {{ $attributes->except('wire:key')->class([
        'z-30 absolute mt-2 whitespace-nowrap'
        ]) }}
        style="display: none;" >
        <div class="relative {{ $height }} soft-scrollbar overflow-auto border border-secondary-200 rounded-lg shadow-lg p-1 bg-white">
            {{ $slot }}
        </div>
    </div>
</div>
