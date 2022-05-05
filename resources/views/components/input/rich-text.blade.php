@php
$id = md5($attributes->wire('model'));
@endphp
<div class="rounded-md shadow-sm" x-data="{
        value:@entangle($attributes->wire('model')),
        isFocused(){ return document.activeElement !== this.$refs.trix },
        setValue(){ this.$refs.trix.editor.loadHTML(this.value) },
    }" x-init="setValue(); $watch('value', () => isFocused() && setValue())" x-on:trix-change="value = $event.target.value" {{ $attributes->whereDoesntStartWith('wire:model') }}
    wire:ignore>

    <input id="{{$id}}" type="hidden">
    <trix-editor input="{{$id}}" x-ref="trix" class="placeholder-secondary-400 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm bg-white"></trix-editor>
</div>

@once
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.css" />
<style>
    [data-trix-button-group="file-tools"] {
        display: none !important;
    }

    [trix-id]>div {
        width: 100%;
    }
</style>
@endpush
@endonce

@once
@push('scripts')
<script src="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.umd.js"></script>
@endpush
@endonce
