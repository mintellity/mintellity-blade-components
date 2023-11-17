# Accordion
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/accordion/)

```php
<x-mint::accordion.host id="tools">
    <x-mint::accordion.item title="Title" accordion-id="tools" id="item">
        Content
    </x-mint::accordion.item>
</x-mint::accordion.host>
```

## Host-Attributes

| Attribute | Description    |
|-----------|----------------|
| id        | ID of the host |

## Item-Attributes

| Attribute    | Description                  |
|--------------|------------------------------|
| accordion-id | ID of the corresponding host |
| title        | Display title of the item    |

## Optional Item-Attributes
| Attribute       | Description                                                                                                |
|-----------------|------------------------------------------------------------------------------------------------------------|
| id              | ID of the item, random string otherwise                                                                    |
| active          | If the item is expanded by default                                                                         |
| livewire-ignore | Adds `wire:ignore.self` to the item title and content to prevent Livewire from resetting the active state  |
