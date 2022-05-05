<div {{ $attributes->merge(['class' => 'flex flex-col mt-5']) }}>
    <div class="-my-2 overflow-x-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full border border-gray-200 rounded-lg shadow bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            {{ $head }}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" {{ $body->attributes }}>
                        {{ $body }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
