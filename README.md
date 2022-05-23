# This is my package tall

TALL Stack Preset

## Installation

You can install the package via composer:

```bash
composer require bebo925/tall //includes https://github.com/wire-elements/modal
php artisan tall:install //this will create insall all of your JS dependencies, create a tailwind.config.js, update your webpack.mix.js file, and create an app.blade.php layout file
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="tall-views"
```

## Usage

```php
    <x-tall::button style="primary">My Button</x-tall::button>
    //styles: default, primary, secondary, warning
    //types: button.flat, button.circle

    <x-tall::input label="My form element" error="property_name">
        <x-tall::input.text />
    </x-tall::input>

    <x-tall::input label="My form element">
        <x-tall::input.checkbox label="My checkbox" />
    </x-tall::input>

    <x-tall::input label="My form element">
        <x-tall::input.radio label="My radio" />
    </x-tall::input>

    <x-tall::input label="My form element">
        <x-tall::input.textarea />
    </x-tall::input>

    <x-tall::input label="My form element">
        <x-tall::input.rich-text />
    </x-tall::input>

    <x-tall::input label="My form element">
        <x-tall::input.select>
            <option>...</option>
        </x-tall::input.select>
    </x-tall::input>

    <x-tall::panel title="The Title">
        <x-slot name="body">
        The body
        </x-slot>
        <x-slot name="footer">
        //some buttons
        </x-slot>
    </x-tall::panel.body>

    <x-tall::messages></x-tall::messages>//exists on layouts/app.blade.php for notification messages
    //session()->flash('message', ['type' => 'success', 'message' => 'This is a success message!']);
    //You can also use Livewire's dispatchBrowserEvent

    //this is just for a modal layout.  Functionality depends on  https://github.com/wire-elements/modal
    <x-tall::modal>
    //slots: title, actions
    </x-tall::modal>
```

## Credits

-   [Ryan McQuerry](https://github.com/bebo925)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
