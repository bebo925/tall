@props(['title' => null])
<div class="bg-white overflow-hidden shadow rounded-lg">
    @if($title)
    <div {{$attributes->class(['flex items-center justify-between flex-wrap sm:flex-nowrap px-3 sm:px-6 pt-3 sm:pt-6'])}} >
        <div class="">
            <h3 class="text-xl leading-6 font-medium text-gray-900">{{$title}}</h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
            @isset($headerActions)
            {{$headerActions}}
            @endisset
        </div>
    </div>
    @endif

    @isset($body)
    <div {{$body->attributes->class(['px-3 py-5 sm:p-10'])}}>
        {{$body}}
    </div>
    @endisset

    {{$slot}}

    @isset($footer)
    <div {{$footer->attributes->class(['px-4 py-4 sm:px-6'])}}>
        {{$footer}}
    </div>
    @endisset

</div>
