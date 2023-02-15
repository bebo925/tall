@props(['placeholder' => 'Select an option', 'options' => [], 'labelField' => 'name', 'valueField' => 'id'])
<div x-data="{
    open: false,
    search: '',
    selectedOptions: @entangle($attributes->wire('model')),
    options: @js($options),
    filteredOptions:@js($options),
    init(){
        $watch('search', value => this.filter());
        this.filter();
    },
    toggle() {
        if (this.open) {
            return this.close()
        }
        this.$refs.button.focus()
        this.open = true
    },
    close(focusAfter) {
        if (! this.open) return
        this.open = false
        focusAfter && focusAfter.focus()
    },
    filter()
    {
       this.filteredOptions =  (this.search.length === 0)
        ? this.options
        : this.options.filter((o) => {
            return o.{{$labelField}}.toLowerCase().includes(this.search.toLowerCase())
        });
    },
    select(option){
       if(this.selectedOptions.some((o) => o.{{$valueField}} === option.{{$valueField}})) {
           this.selectedOptions = this.selectedOptions.filter((item) => item.{{$valueField}} !== option.{{$valueField}})
       }else{
        this.selectedOptions.push(option);
       }
       this.search = '';
    },
    remove(option){
        this.selectedOptions = this.selectedOptions.filter((item) => item !== option)
    }
}" x-cloak x-on:click.outside="open = false" wire:ignore {{$attributes->class(['relative'])}}>
    <div x-ref="button" x-on:click="toggle()" :aria-expanded="open" {{$attributes->class(['flex flex-wrap w-full gap-2 pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm rounded-md border bg-white focus:ring-1 focus:outline-none border-secondary-300 focus:ring-primary-500 focus:border-primary-500 relative'])}}>
        <template x-for="item in selectedOptions" :key="'selected-options'+item.{{$valueField}}">
            <div class="px-2 py-1 bg-gray-200 rounded text-xs flex items-center shadow">
                <div x-text="item.{{$labelField}}" class="mr-2"></div>
                <button x-on:click.stop="remove(item)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </template>
        <div x-show="selectedOptions.length === 0">{{$placeholder}}</div>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
    </div>

    <div x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;" class="absolute z-10 max-h-60 w-full overflow-auto rounded-b-md bg-white text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm div{{$valueField}}e-y div{{$valueField}}e-gray-200">
        <input type="text" x-model="search" placeholder="Search" class="border-0 focus:ring-0 outline-none" />

        <template x-for="option in filteredOptions" :key="'options'+option.{{$valueField}}">
            <div x-on:click="select(option)" class="text-gray-900 relative cursor-pointer select-none py-2 pl-8 pr-4 hover:bg-primary-50">
                <span class="text-primary-600 absolute inset-y-0 left-0 flex items-center pl-1.5">
                    <svg x-show="selectedOptions.some((o)=> o.{{$valueField}} === option.{{$valueField}})" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-h{{$valueField}}den="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                </span>

                <div x-text="option.{{$labelField}}" class="ml-2"></div>
            </div>
        </template>
    </div>
</div>
