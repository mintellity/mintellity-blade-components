# Dropdown
[Bootstrap](https://getbootstrap.com/docs/5.3/components/dropdowns/)

```bladehtml
<x-mint::dropdown title="Dropdown">
    <x-mint::dropdown.item>
        Item 1
    </x-mint::dropdown.item>
    <x-mint::dropdown.item onclik="() => console.log('on click')">
        Item 2
    </x-mint::dropdown.item>
    <x-mint::dropdown.item href="#">
        Item 3
    </x-mint::dropdown.item>
</x-mint::dropdown>

<x-mint::dropdown>
    <x-slot:title>
        <x-mint::icon name="file-pdf" />
    </x-slot:title>
    
    <x-mint::dropdown.item>
        PDF 1
    </x-mint::dropdown.item>
</x-mint::dropdown>
```
