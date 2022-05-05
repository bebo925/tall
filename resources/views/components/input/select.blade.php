<select {{ $attributes->class(['form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm rounded-md border bg-white focus:ring-1 focus:outline-none border-secondary-300 focus:ring-primary-500 focus:border-primary-500' ])->merge([]) }}>
    {{ $slot }}
</select>
