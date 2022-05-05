<div class="relative bg-blue-gray-900 text-blue-gray-300">
    <button type="button" wire:click="$emit('closeModal')" class="absolute p-3 text-gray-500 rounded-full cursor-pointer ring-0 focus:ring-0 top-5 right-5 hover:bg-gray-200 hover:text-gray-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    @if(!empty($title))
    <div class="px-5 pt-5 text-2xl text-gray-700 font-bold">
        {{$title}}
    </div>
    @endif

    <div class="px-8 py-5">
        {{$slot}}
    </div>

    @if(!empty($actions))
    <div class="flex items-end justify-end px-8 py-4 space-x-2 mb-3">
        {{$actions}}
    </div>
    @endif
</div>
