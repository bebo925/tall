@props(['name' => null])
@error($name)
<div class="mt-1 text-sm text-red-500">{{ $message }}</div>
@enderror
