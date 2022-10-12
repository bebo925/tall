# This is my package tall

TALL Stack Preset

## Installation

You can install the package via composer:

```bash
composer require bebo925/tall //includes https://github.com/wire-elements/modal
php artisan tall:install //this will create insall all of your JS dependencies, create a tailwind.config.js, update your webpack.mix.js file, and create an app.blade.php layout file
```

You will need to edit the host variable in 'vite.config.js' file for hot reloading to work.

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="tall-views"
```

## Usage

```php
    <x-tall::button style="primary">My Button</x-tall::button>
    //styles: default, primary, secondary, warning, danger
    //types: button.flat, button.circle, button.outline

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

    <x-tall::page-heading title="Page Title">
        <x-slot name="meta">
        </x-slot>
        <x-slot name="actions">
        </x-slot>
    </x-tall::page-heading>

    <x-tall::messages dark="true"></x-tall::messages>//exists on layouts/app.blade.php for notification messages
    //session()->flash('message', ['type' => 'success', 'message' => 'This is a success message!']);
    //You can also use Livewire's dispatchBrowserEvent

    //this is just for a modal layout.  Functionality depends on  https://github.com/wire-elements/modal
    <x-tall::modal>
    //slots: title, actions
    </x-tall::modal>

    <x-tall::table>
        <x-slot name="head">
         <x-tall::table.heading>Some Heading</x-tall::table.heading>
        </x-slot>
        <x-slot name="body">
         <x-tall::table.row>
            <x-tall::table.cell>
            Some cell
            </x-tall::table.cell>
         </x-tall::table.row>
        </x-slot>
    </x-tall::table>

    $emit('openDialog', 'tall-confirmation-dialog', [
            'message' => 'Are you sure you want to delete?',
            'title' => 'Warning',
            'data' => $someId,
            'confirmText' => 'Delete',
            'style' => 'danger',
            'event' = 'someEventToListenFor'
        ]);

    <livewire:tall-markdown-x :content="$application->faq ?? ''" :style="[
        'toolbar'=> 'flex items-center justify-between',
        'textarea' => 'h-[60vh] focus:outline-none p-4 w-full',
        'preview' => 'p-10',
        'help' => 'p-8 prose max-w-none'
        ]" />

        <x-tall::dropdown>
            <x-slot name="trigger">
                button
            </x-slot>

            <x-tall::dropdown.item>
                item
            </x-tall::dropdown.item>
        </x-tall::dropdown>

        <x-tall::multiple-select :options="MyModel::all()" wire:model.defer="selected"></x-tall::multiple-select>//valueField=id, labelField=name
```

## Credits

-   [Ryan McQuerry](https://github.com/bebo925)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
