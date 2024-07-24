# Tables

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
        @forelse ($users as $key => $form)
        <x-mint::table.body.row :odd="$loop->odd">
            <x-mint::table.body.col>
                <a href="{{ route('web.user.edit', $user) }}"
                   class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
            </x-mint::table.body.col>
            <x-mint::table.body.col>{{ $user->email }}</x-mint::table.body.col>
            <x-mint::table.body.col :final-col="true">
                <a href="{{ route('web.user.delete', $user) }}"
                   class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                    <x-mint::icon name="trash"/>
                </a>
            </x-mint::table.body.col>
        </x-mint::table.body.row>
        @empty
        <x-mint::table.body.row>
            <x-mint::table.body.col :colspan="3">
                <div class="text-center text-muted">Keine Einträge gefunden</div>
            </x-mint::table.body.col>
        </x-mint::table.body.row>
        @endforelse
    </x-mint::table.body>

    @if($users->hasPages())
    <x-mint::table.foot>
        <x-mint::table.foot.row>
            <x-mint::table.foot.col colspan="4">
                {{ $users->links() }}
            </x-mint::table.foot.col>
        </x-mint::table.foot.row>
    </x-mint::table.foot>
    @endif
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
