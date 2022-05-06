@props(['label' => '', 'disabled' => false, 'name' => md5(uniqid(rand(), true)), 'id' => md5(uniqid(rand(), true)), 'error' => null])
<div>
    <label for="{{ $id }}" class="flex items-center">
        <input {{ $attributes->class([
        'form-checkbox rounded transition ease-in-out duration-100 border-secondary-300 text-primary-600 focus:ring-primary-600 focus:border-primary-400'
        ])->merge([
        'type' => 'checkbox',
        'name' => $name,
        'id' => $id,
        ]) }} />

        @if ($label)
        <label for="{{$id}}" class="block text-sm font-medium text-secondary-700 ml-2">{{$label}}</label>
        @endif
    </label>
    @if($error)
    <x-tall::input.error :name="$error"></x-tall::input.error>
    @endif
</div>
