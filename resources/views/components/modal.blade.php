@props(['showClose' => true])
<div {{$attributes->merge(['class' => 'relative'])}}>
    @if($showClose)
    <button type="button" wire:click="$emit('closeModal')" class="absolute p-2 text-secondary-500 rounded-full cursor-pointer ring-0 focus:ring-0 top-3 right-3 hover:bg-secondary-200 hover:text-secondary-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    @endif

    @if(!empty($title))
    <div {{$title->attributes->class(['px-8 pt-8 pb-5 text-2xl text-secondary-700 font-bold'])}}>
        {{$title}}
    </div>
    @endif

    <div class="px-8 py-5">
        {{$slot}}
    </div>

    @if(!empty($actions))
    <div {{$actions->attributes->class(['flex items-end justify-end px-8 py-4 space-x-2'])}} >
        {{$actions}}
    </div>
    @endif
</div>
