# Tabs
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/navs-tabs/#javascript-behavior)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-tabs-pills.html)

```php
<x-mint::tabs.host id="tools">
    <x-mint::tabs.item hostId="tools" title="Title">
        Content
    </x-mint::tabs.item>
</x-mint::tabs.host>
```

## Host-Attributes

| Attribute | Description     |
|-----------|-----------------|
| id        | ID of the host  |

## Optional Host-Attributes

| Attribute           | Description   |
|---------------------|---------------|
| nav-class           |               |
| nav-wrapper-element | Wrap the tabs |
| nav-wrapper-class   |               |

## Item-Attributes:

| Attribute | Description                                                  |
|-----------|--------------------------------------------------------------|
| host-id   | ID of the corresponding host                                 |
| title     | Display title of the tab                                     |
| icon      | Name of the regular Boxicons icons without the "bx" - prefix |

## Optional Item-Attributes:
| Attribute | Description                             |
|-----------|-----------------------------------------|
| id        | ID of the pane, random string otherwise |
| active    | If the pane is active by default        |
