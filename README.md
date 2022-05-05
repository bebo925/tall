# This is my package tall

TALL Stack Preset

## Installation

You can install the package via composer:

```bash
composer require Fayette-County-Public-Schools/tall
php artisan tall:install
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="tall-views"
```

## Usage

```php
<x-tall::app >
    <tall::button style="primary" />
</x-tall::app>
```

## Credits

-   [Ryan McQuerry](https://github.com/bebo925)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
