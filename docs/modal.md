# Modal
[Bootstrap-Component](https://getbootstrap.com/docs/5.3/components/modal/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/ui-modals.html)

```bladehtml
<x-mint::modal id="tools">
    <x-mint::modal.header host-id="tools">
        Benutzer bearbeiten
    </x-mint::modal.header>
    
    <x-mint::modal.body>
        Content
    </x-mint::modal.body>
    
    <x-mint::modal.footer>
        <button type="button" data-bs-dismiss="modal">Abbrechen</button>
        <button type="submit">Speichern</button>
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
