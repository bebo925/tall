<x-tall::modal :showClose="false">
    <x-slot name="title">{!! $title !!}</x-slot>

    <div class="">
        {!! $message !!}
    </div>

    <x-slot name="actions">
        <x-tall::button.flat style="secondary" wire:click="cancel()" class="mr-2">{{$cancelText}}</x-tall::button.flat>
        <x-tall::button style="{{$style}}" wire:click="confirm()">{{$confirmText}}</x-tall::button>
    </x-slot>
</x-tall::modal>
