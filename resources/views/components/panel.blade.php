<div class="bg-white overflow-hidden shadow rounded-lg">
    @isset($header)
    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
        {{$header}}
    </div>
    @endisset
    <div class="px-4 py-5 sm:p-6">
        {{$slot}}
    </div>
    @isset($footer)
    <div class="border-t border-gray-200 px-4 py-4 sm:px-6">
        {{$footer}}
    </div>
    @endisset
</div>
