# Tabs
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/navs-tabs/#javascript-behavior)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-tabs-pills.html)

```bladehtml

<x-mint::tabs id="tabs" class="nav-align-top mb-4">
    <x-mint::tabs.pane host-id="tabs" title="Title 1" active>Content 1</x-mint::tabs.pane>
    <x-mint::tabs.pane host-id="tabs" title="Title 2">Content 2</x-mint::tabs.pane>
    <x-mint::tabs.pane host-id="tabs" title="Title 3">Content 3</x-mint::tabs.pane>
</x-mint::tabs>
```

## Filled tabs

```bladehtml

<x-mint::tabs id="tabs2" class="nav-align-top mb-4" nav-class="nav-tabs nav-fill">
    <x-mint::tabs.pane host-id="tabs2" title="Title 1" icon="edit" active>Content 1</x-mint::tabs.pane>
    <x-mint::tabs.pane host-id="tabs2" title="Title 2" icon="pencil">Content 2</x-mint::tabs.pane>
    <x-mint::tabs.pane host-id="tabs2" title="Title 3" icon="star">Content 3</x-mint::tabs.pane>
</x-mint::tabs>
```

## Pills

```bladehtml

<x-mint::tabs id="tabs4" class="nav-align-top" nav-class="nav-pills mb-3">
    <x-mint::tabs.pane host-id="tabs4" title="Title 1" active>Content 1</x-mint::tabs.pane>
    <x-mint::tabs.pane host-id="tabs4" title="Title 2">Content 2</x-mint::tabs.pane>
    <x-mint::tabs.pane host-id="tabs4" title="Title 3">Content 3</x-mint::tabs.pane>
</x-mint::tabs>
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
