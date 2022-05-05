@props(['label' => '', 'disabled' => false, 'name' => md5(uniqid(rand(), true)), 'id' => md5(uniqid(rand(), true)), 'error' => null])
<div>
    <label for="{{ $id }}" class="flex items-center">
        <input {{ $attributes->class([ 'form-radio rounded-full transition ease-in-out duration-100 border-secondary-300 text-primary-600 focus:ring-primary-600 focus:border-primary-400'
        ])->merge([
        'type' => 'radio',
        'id' => $id,
        'name' => $name,
        ]) }} />

        <label for="{{$id}}" class="block text-sm font-medium text-secondary-700 ml-2">{{$label}}</label>
    </label>
</div>
