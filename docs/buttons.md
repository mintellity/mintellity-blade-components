# Buttons

[Bootstrap-Component](https://getbootstrap.com/docs/5.0/components/buttons/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-buttons.html)

```bladehtml
<x-mint::button onclick="alert('Hello World!')">
    Simple Button
</x-mint::button>

<x-mint::button href="#">
    Simple Link Button
</x-mint::button>
```

## Default

```bladehtml
<x-mint::button color="primary">Button</x-mint::button>
<x-mint::button color="primary" :rounded="true">Rounded</x-mint::button>
<x-mint::button color="primary" disabled>Disabled</x-mint::button>
```

## Label

```bladehtml
<x-mint::button color="primary" :label="true">Button</x-mint::button>
<x-mint::button color="primary" :label="true" :rounded="true">Rounded</x-mint::button>
<x-mint::button color="primary" :label="true" disabled>Disabled</x-mint::button>
```

## Outline

```bladehtml
<x-mint::button color="primary" :outline="true">Button</x-mint::button>
<x-mint::button color="primary" :outline="true" :rounded="true">Rounded</x-mint::button>
<x-mint::button color="primary" :outline="true" disabled>Disabled</x-mint::button>
```

## Sizing

```bladehtml
<x-mint::button color="primary" size="xs">Button xs</x-mint::button>
<x-mint::button color="primary" size="sm">Button sm</x-mint::button>
<x-mint::button color="primary" size="lg">Button lg</x-mint::button>
<x-mint::button color="primary" size="xl">Button xl</x-mint::button>
```

## Colors

```bladehtml
<x-mint::button color="primary">Primary</x-mint::button>
<x-mint::button color="secondary">Secondary</x-mint::button>
<x-mint::button color="success">Success</x-mint::button>
<x-mint::button color="danger">Danger</x-mint::button>
<x-mint::button color="warning">Warning</x-mint::button>
<x-mint::button color="info">Info</x-mint::button>
<x-mint::button color="dark">Dark</x-mint::button>
```

## Icons

```bladehtml
<x-mint::button color="primary" icon="basket-shopping">
    Button
</x-mint::button>

<x-mint::button color="primary" :square="true">
    <x-mint::icon name="basket-shopping"/>
    <span class="visually-hidden">Shopping Card</span>
</x-mint::button>

<x-mint::button color="primary" :square="true" :rounded="true">
    <x-mint::icon name="basket-shopping"/>
    <span class="visually-hidden">Shopping Card</span>
</x-mint::button>
```

## Badges
    
```bladehtml
<x-mint::button color="primary">
    Button
    <x-mint::badge color="primary" :label="true" class="ms-1">4</x-mint::badge>
</x-mint::button>

<x-mint::button color="primary" :label="true">
    Button
    <x-mint::badge color="white" class="text-primary ms-1">4</x-mint::badge>
</x-mint::button>

<x-mint::button color="secondary" class="d-inline-block">
    Pill
    <x-mint::badge badge="notifications" color="danger" :rounded="true">12</x-mint::badge>
</x-mint::button>
```
## Optional Attributes:

| Attribute | Description                                               | Default | Value                                                                     |
|-----------|-----------------------------------------------------------|---------|---------------------------------------------------------------------------|
| color     | Name of the bootstrap button color without "btn-"         | NULL    | `primary` or other valid color name, `facebook` or other valid brand name |
| size      | Name of the bootstrap button size without "btn-"          | NULL    | `xs` `sm` `lg` `xl`                                                       |
| outline   | Outline without Background / Lightweight Background color | FALSE   |                                                                           |
| label     | Outline without Background / Lightweight Background color | FALSE   |                                                                           |
| rounded   | Fully rounded corners                                     | FALSE   |                                                                           |
| square    | Equilateral width and height                              | FALSE   |                                                                           |
