# Tabs
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/navs-tabs/#javascript-behavior)

```php
<x-mint::tabs.host id="tools">
    <x-mint::tabs.item title="Title" id="item">
        Content
    </x-mint::tabs.item>
</x-mint::tabs.host>
```

## Optional Host-Attributes

| Attribute | Description                                |
|-----------|--------------------------------------------|
| id        | ID of the Wrapper, random string otherwise |

## Item-Attributes:

| Attribute | Description              |
|-----------|--------------------------|
| title     | Display title of the tab |

## Optional Item-Attributes:
| Attribute | Description                             |
|-----------|-----------------------------------------|
| id        | ID of the pane, random string otherwise |
| active    | If the pane is active by default        |
