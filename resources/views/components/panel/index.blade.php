@prop(['title' => null])
<div class="bg-white overflow-hidden shadow rounded-lg">
    @if($title)
    <div {{$attributes->class(['-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap'])}} >
        <div class="ml-4 mt-2">
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{$title}}</h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
            @isset($headerActions)
            {{$headerActions}}
            @endisset
        </div>
    </div>
    @endif

    @if($body)
    <div {{$body->attributes->class(['px-4 py-5 sm:p-6'])}}>
        {{$body}}
    </div>
    @endif

    {{$slot}}

    @isset($footer)
    <div {{$footer->attributes->class(['px-4 py-4 sm:px-6'])}}>
        {{$footer}}
    </div>
    @endisset

</div>
