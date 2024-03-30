@props(['options' => [], 'multiple' => false, 'placeholder' => 'Select an Option'])
<div x-data="{
            query: '',
            attributes: @js($attributes->wire('model')),
            selected: null,
            options: @js($options),
            get filteredOptions() {
                return this.query === ''
                    ? this.options
                    : this.options.filter((option) => {
                        return option.name.toLowerCase().includes(this.query.toLowerCase())
                    })
            },
            init()
            {
                this.selected = (@js($multiple))
                    ?this.options.filter(option => $wire[this.attributes.value].includes(option.id))
                    :this.options.find(option => option.id === $wire[this.attributes.value]);

                $watch('selected', option => {
                    console.log('selected', option);
                      $wire[this.attributes.value] = (@js($multiple))
                        ?this.selected.map(option => option.id)
                        :this.selected.id;
                    if(this.attributes.directive.includes('.live'))$wire.$refresh();
                    this.query = '';
                });
            },
            remove(option) {
                this.selected = this.selected.filter((i) => i.id !== option.id)
            }
        }" class="max-w-xs w-full">
    <div x-combobox x-model="selected" by="id" @if($multiple) multiple @endif class="rounded-lg p-0">
        <div @class(['relative', 'py-2 pl-2 pr-6'=> $multiple])>
            @if(!$multiple)
            <x-tall::input.text x-combobox:input x-bind:display-value="option => option.name" @change="query = $event.target.value;" placeholder="Search..."></x-tall::input.text>
            @endif
            <div class="flex flex-wrap" x-combobox:button>
                @if($multiple)
                <div x-cloak class="flex flex-wrap items-center gap-1.5">
                    <template x-for="option in selected" :key="option.id">
                        <button x-on:click.prevent="remove(option)" class="inline-flex items-center gap-1 p-1 px-2 text-xs rounded bg-gray-200 text-gray-800 hover:text-gray-800">
                            <span x-text="option.name"></span>
                            <!-- Heroicons mini x-mark -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </template>
                </div>

                <div x-show="!selected.length" class="text-gray-500 text-sm pl-2">
                    {{ $placeholder }}
                </div>
                @endif

                <button class="absolute inset-y-0 right-0 flex items-center">
                    <!-- Heroicons up/down -->
                    <svg class="shrink-0 w-5 h-5 text-gray-500 mr-2" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <div x-combobox:options x-cloak class="absolute left-0 max-w-xs w-full max-h-60 mt-2 z-10 origin-top-right overflow-auto bg-white border border-gray-200 rounded-md shadow-md outline-none" x-transition.out.opacity>
                <div class="relative">
                    @if($multiple)
                    <input x-combobox:input @change="query = $event.target.value;" placeholder="Search..." class="sticky shadow top-0 border-none focus:ring-0 focus:outline-0 text-sm px-3 bg-none w-full" />
                    @endif
                    <ul class="divide-y divide-gray-100">
                        <template x-for="option in filteredOptions" :key="option.id" hidden>
                            <li x-combobox:option :value="option" :disabled="option.disabled" :class="{
                                            'bg-gray-500/10 text-gray-900': $comboboxOption.isActive,
                                            'text-gray-600': !$comboboxOption.isActive,
                                            'opacity-50 cursor-not-allowed': $comboboxOption.isDisabled,
                                        }" class="flex items-center cursor-default justify-between gap-2 w-full px-4 py-2 text-sm">
                                <span x-text="option.name"></span>
                                <span x-show="$comboboxOption.isSelected" class="text-cyan-600 font-bold">&check;</span>
                            </li>
                        </template>
                    </ul>
                    <p x-show="filteredOptions.length == 0" class="px-4 py-2 text-sm text-gray-600">No options match your query.</p>
                </div>
            </div>
        </div>
    </div>
</div>
