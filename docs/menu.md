# Menu

```bladehtml

<x-mint::menu.header>
    Header
</x-mint::menu.header>

<x-mint::menu.group title="Group" :active="true">
    <x-mint::menu.item
        href="#"
        :active="false">
        Item 1
    </x-mint::menu.item>
    
    <x-mint::menu.item
        href="#"
        :active="fn() => false">
        Item 2
    </x-mint::menu.item>
    
    <x-mint::menu.sub-group title="Subgroup" :active="true">
        <x-mint::menu.item
            href="#"
            :active="true">
            Item 3
        </x-mint::menu.item>
    </x-mint::menu.sub-group>
</x-mint::menu.group>
```
