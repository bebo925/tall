@props(['label' => '', 'hint' => null, 'disabled' => false, 'name' => random_bytes(20), 'error' => null])

<div class="{{$attributes->get('class')}} @if($disabled) opacity-60 @endif">
    @if ($label)
    <div class="flex mb-1">
        @if ($label)
        <label for="{{$name}}" class="block text-sm font-medium text-secondary-700">{{$label}}</label>
        @endif
    </div>
    @endif

    {{$slot}}

    @if ($hint)
    <label for="{{ $name }}" class="mt-2 text-sm text-secondary-500 dark:text-secondary-400">
        {{ $hint }}
    </label>
    @endif

    <x-tall::input.error :name="$error"></x-tall::input.error>
</div>
