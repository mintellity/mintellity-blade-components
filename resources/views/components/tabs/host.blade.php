@props([
    'id' => 'tab-host-' . Str::random(8)
])

<div {{ $attributes }}>
    <nav>
        <div class="nav nav-tabs custom-nav-tabs" id="{{ $hostId }}" role="tablist">
            @stack('titles')
        </div>
    </nav>

    <div class="tab-content" id="{{ $hostId }}Content">
        @stack('contents')
    </div>
</div>

