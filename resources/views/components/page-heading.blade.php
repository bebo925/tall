@props(['title' => null])
<div class="lg:flex lg:items-center lg:justify-between">
    <div class="flex-1 min-w-0">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            {{$title}}
            {{$slot}}
        </h2>
        @if(isset($meta))
        <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            {{$meta}}
        </div>
        @endif
    </div>
    <div class="mt-5 flex lg:mt-0 lg:ml-4">
        {{$actions ?? ''}}
    </div>
</div>
