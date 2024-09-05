### Badge
[Bootstrap-Components](https://getbootstrap.com/docs/5.0/components/badge/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-badges.html)

```bladehtml
<x-mint::badge color="primary">
    Simple Badge
</x-mint::badge>

<x-mint::badge color="primary" pill>
    Rounded Badge
</x-mint::badge>

<x-mint::badge color="primary" square>
    <x-mint::icon name="bell" />
</x-mint::badge>

<x-mint::button class="d-inline-block">
    Button with notification badge
    <x-mint::badge badge="notifications" color="danger" :rounded="true">1</x-mint::badge>
</x-mint::button>
```

## Optional Attributes:

| Attribute | Description                                          | Default | Value                               |
|-----------|------------------------------------------------------|---------|-------------------------------------|
| color     | Name of the Bootstrap background color without "bg-" | NULL    | `primary` or other valid color name |
| type      | Lightweight background color                         | NULL    | `label`                             |
| pill      | Fully rounded corners                                | FALSE   |                                     |
| square    | Equilateral width and height                         | FALSE   |                                     |
| badge     | Placement in the upper-right corner / Dots style     | NULL    | `notificatins` `dot`                |
