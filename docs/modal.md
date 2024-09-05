# Modal
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/modal/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-modals.html)

```bladehtml

<x-mint::button data-bs-toggle="modal" data-bs-target="#tools">Launch Modal</x-mint::button>

<x-mint::modal id="tools">
    <x-mint::modal.header host-id="tools">
        Benutzer bearbeiten
    </x-mint::modal.header>

    <x-mint::modal.body>
        Content
    </x-mint::modal.body>

    <x-mint::modal.footer>
        <x-mint::button label data-bs-dismiss="modal">Abbrechen</x-mint::button>
        <x-mint::button>Speichern</x-mint::button>
    </x-mint::modal.footer>
</x-mint::modal>
```

## Fullscreen

```bladehtml

<x-mint::button color="primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">Launch modal</x-mint::button>

<x-mint::modal id="fullscreenModal" class="modal-fullscreen">
    <x-mint::modal.header host-id="fullscreenModal">
        Title
    </x-mint::modal.header>
    <x-mint::modal.body>
        Content
    </x-mint::modal.body>
    <x-mint::modal.footer>
        <x-mint::button label data-bs-dismiss="modal">Close</x-mint::button>
        <x-mint::button data-bs-dismiss="modal">Save changes</x-mint::button>
    </x-mint::modal.footer>
</x-mint::modal>
```

## Vertically Centered

```bladehtml

<x-mint::button color="primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Launch modal</x-mint::button>

<x-mint::modal id="modalCenter" class="modal-dialog-centered">
    <x-mint::modal.header host-id="modalCenter">
        Title
    </x-mint::modal.header>
    <x-mint::modal.body>
        Content
    </x-mint::modal.body>
    <x-mint::modal.footer>
        <x-mint::button label data-bs-dismiss="modal">Close</x-mint::button>
        <x-mint::button data-bs-dismiss="modal">Save changes</x-mint::button>
    </x-mint::modal.footer>
</x-mint::modal>
```

## Host-Attributes

| Attribute | Description    |
|-----------|----------------|
| id        | ID of the host |

## Item-Attributes

| Attribute | Description                                                 |
|-----------|-------------------------------------------------------------|
| host-id   | ID of the corresponding host                                |
