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

### [Accordion](https://getbootstrap.com/docs/5.1/components/accordion/)
```php
<x-mint::accordion.host id="tools">
    <x-mint::accordion.item title="Title" accordion-id="tools" id="item">
        Content
    </x-mint::accordion.item>
</x-mint::accordion.host>
```
Host-Attributes:
 - id

Item-Attributes:
 - accordion-id
 - title

Optional Item-Attributes:
 - id
 - active
 - livewire-ignore Adds `wire:ignore.self` to the item title and content to prevent Livewire from resetting the active state

### [Form-Inputs](https://getbootstrap.com/docs/5.1/forms/overview/)
```php
<x-mint::form.input name="name" label="Betrag" value="100">
    <x-mint::form.input.prepend>Ab</x-mint::form.input.prepend>
    <x-mint::form.input.append>€</x-mint::form.input.append>
</x-mint::form.input>
```
Attributes:
 - name

Optional Attributes:
 - accept
 - disabled
 - hint
 - label
 - max
 - min 
 - readonly 
 - required
 - step 
 - type
 - value

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

```php
<x-mint::form.color name="name" />
```

### Icon
Font-Awesome-Icon
```php
<x-mint::icon name="arrow-left" class="text-primary" />
```
Attributes:
 - name

### [Modal](https://getbootstrap.com/docs/5.1/components/modal/)
```php
<x-mint::modal id="tools">
    <x-mint::modal.header>
        Benutzer bearbeiten
    </x-mint::modal.header>
    
    <x-mint::modal.body>
        Content
    </x-mint::modal.body>
    
    <x-mint::modal.footer>
        <button type="button" data-bs-dismiss="modal">Abbrechen</button>
        <button type="submit">Speichern</button>
    </x-mint::modal.footer>
</x-mint::modal>
```

### [Tabs](https://getbootstrap.com/docs/5.1/components/navs-tabs/#javascript-behavior)
```php
<x-mint::tabs.host id="tools">
    <x-mint::tabs.item title="Title" id="item">
        Content
    </x-mint::tabs.item>
</x-mint::tabs.host>
```
Optional Host-Attributes:
 - id

Item-Attributes:
 - title

Optional Item-Attributes:
 - id
 - active

## Credits

- [Mintellity GmbH](https://github.com/mintellity)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
