<div {{$attributes->class(['-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap'])}} >
    <div class="ml-4 mt-2">
        <h3 class="text-lg leading-6 font-medium text-gray-900">{{$title ?? ''}}</h3>
    </div>
    <div class="ml-4 mt-2 flex-shrink-0">
        @isset($actions)
        {{$actions}}
        @endisset
    </div>
</div>
