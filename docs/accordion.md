# Accordion
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/accordion/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-accordion.html)

```bladehtml
<x-mint::accordion id="tools">
    <x-mint::accordion.item host-id="tools" title="Title">
        Content
    </x-mint::accordion.item>
</x-mint::accordion>
```

### Always Open Panel
```bladehtml
<x-mint::accordion id="tools">
    <x-mint::accordion.item host-id="tools" title="Title" active no-sync>
        Content
    </x-mint::accordion.item>
</x-mint::accordion>
```

## Host-Attributes

| Attribute | Description    |
|-----------|----------------|
| id        | ID of the host |

## Item-Attributes

| Attribute | Description                                                 |
|-----------|-------------------------------------------------------------|
| host-id   | ID of the corresponding host                                |
| title     | Display title of the item                                   |
| icon      | Name of the regular boxicons icon without the "bx" - prefix |

## Optional Item-Attributes
| Attribute       | Description                                                                                               |
|-----------------|-----------------------------------------------------------------------------------------------------------|
| id              | ID of the item, random string otherwise                                                                   |
| active          | If the item is expanded by default                                                                        |
| no-sync         | Keep open when other items are opened                                                                     |
| livewire-ignore | Adds `wire:ignore.self` to the item title and content to prevent Livewire from resetting the active state |
