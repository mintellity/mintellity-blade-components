@props([
    'title' => null,
])

<div class="card">
    @if($title)
        <x-mint::card.header>
            <h5 class="card-title">{{ $title }}</h5>
        </x-mint::card.header>
    @else
        {{ $header ?? '' }}
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    {{ $footer ?? '' }}
</div>
