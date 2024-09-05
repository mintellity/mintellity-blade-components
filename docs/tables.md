# Tables

```bladehtml

<x-mint::table>
    <x-mint::table.head>
        <x-mint::table.head.row>
            <x-mint::table.head.col>Name</x-mint::table.head.col>
            <x-mint::table.head.col>E-Mail</x-mint::table.head.col>
            <x-mint::table.head.col :final-col="true">Aktionen</x-mint::table.head.col>
        </x-mint::table.head.row>
    </x-mint::table.head>

    <x-mint::table.body>
        <x-mint::table.body.row>
            <x-mint::table.body.col>
                <a href="#"
                   class="text-gray-800 text-hover-primary mb-1">Name</a>
            </x-mint::table.body.col>
            <x-mint::table.body.col>name@test.de</x-mint::table.body.col>
            <x-mint::table.body.col :final-col="true">
                <x-mint::button href="#" color="danger" icon="trash" square/>
            </x-mint::table.body.col>
        </x-mint::table.body.row>
    </x-mint::table.body>
</x-mint::table>
```

## Livewire-Sorting and pagination (optional)

```php
<?php

namespace App\Livewire;

use Livewire\Component;
use Mintellity\BladeComponents\Traits\WithSorting;

class UserTable extends Component
{
    use WithSorting;

    public function render(): View
    {
        $users = User::query()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.user-table', compact('users'));
    }
}
```

```bladehtml

<x-mint::table>
    <x-mint::table.head>
        <x-mint::table.head.row>
            <x-mint::table.head.col sort-by="name">Name</x-mint::table.head.col>
            <x-mint::table.head.col sort-by="email">E-Mail</x-mint::table.head.col>
            <x-mint::table.head.col :final-col="true">Aktionen</x-mint::table.head.col>
        </x-mint::table.head.row>
    </x-mint::table.head>

    <x-mint::table.body>
        <x-mint::table.body.row>
            <x-mint::table.body.col>
                <a href="#"
                   class="text-gray-800 text-hover-primary mb-1">Name</a>
            </x-mint::table.body.col>
            <x-mint::table.body.col>name@test.de</x-mint::table.body.col>
            <x-mint::table.body.col :final-col="true">
                <x-mint::button href="#" color="danger" icon="trash" square/>
            </x-mint::table.body.col>
        </x-mint::table.body.row>
    </x-mint::table.body>
</x-mint::table>
```
