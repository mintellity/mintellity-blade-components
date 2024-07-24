@props([
    'title' => null,
])

@php
    $bodyAttributes = $attributes->prefixed('body');
    $groupAttributes = $attributes->notPrefixed('body');
@endphp

<div {{ $groupAttributes->class("card") }}>
    @if($title)
        <x-mint::card.header>
            <h5 class="card-title mb-0">{{ $title }}</h5>
        </x-mint::card.header>
    @else
        {{ $header ?? '' }}
    @endif

    <div {{ $bodyAttributes->class("card-body") }}>
        {{ $slot }}
    </div>

    {{ $footer ?? '' }}
</div>
