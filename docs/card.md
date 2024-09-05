# Card
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/card/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/cards-basic.html)

```bladehtml
<x-mint::card title="Card">
    Content
</x-mint::card>
```

## Custom Header
```bladehtml

<x-mint::card>
    <x-slot name="header">
        <x-mint::card.header>
            <h5 class="card-title mb-0">
                <x-mint::icon name="bell" class="me-2"/>
                Custom Header
            </h5>
        </x-mint::card.header>
    </x-slot>

    Content
</x-mint::card>
```

## Footer
```bladehtml
<x-mint::card title="Card">
    Content

    <x-slot name="footer">
        <x-mint::card.footer>
            <x-mint::button color="primary">Button</x-mint::button>
        </x-mint::card.footer>
    </x-slot>
</x-mint::card>
```
