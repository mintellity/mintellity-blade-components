# Bootstrap CSS Blade component for Laravel

## Installation & Requirements

This package requires:
 - Craft by Keenthemes (https://preview.keenthemes.com/craft/) ->Bootstrap 5, jQuery
 - Font-Awesome (https://fontawesome.com/)
 - Pikaday (https://github.com/Pikaday/Pikaday)

You can install the package via composer:

```bash
composer require mintellity/blade-components
```

## Usage

### Icon
Font-Awesome-Icon
```php
<x-mint::icon name="arrow-left" />
```

### Form-Inputs
```php
<x-mint::form.input name="name" value="100">
    <x-mint::form.input.prepend>From</x-mint::form.input.prepend>
    <x-mint::form.input.append>€</x-mint::form.input.append>
</x-mint::form.input>
```
Attributes:
 - type
 - required
 - disabled
 - readonly 
 - step 
 - min 
 - max

```php
<x-mint::form.checkbox name="name" />
```

```php
<x-mint::form.select name="name" :options="['value' => 'Name']" />
```

```php
<x-mint::form.radio name="name" />
```

```php
<x-mint::form.file name="name" />
```

```php
<x-mint::form.textarea name="name" />
```

```php
<x-mint::form.date name="name" />
```

```php
<x-mint::form.time name="name" />
```

## Credits

- [Mintellity GmbH](https://github.com/mintellity)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
