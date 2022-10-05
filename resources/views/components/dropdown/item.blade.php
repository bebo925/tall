<a {{ $attributes->merge(['class' => 'text-secondary-600 px-4 py-2 text-sm flex items-center cursor-pointer rounded-md']) }} x-on:click="open=false" >
    {{$slot}}
</a>
