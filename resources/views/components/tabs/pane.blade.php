@props([
    'hostId',
    'tabId' => 'tab-pane-' . Str::random(8),
    'title',
    'active' => false,
    'icon' => false
])

@push("titles-{$hostId}")
    <div class="nav-item" role="presentation">
        <button
            @class(["nav-link", "active" => $active ?? false])
            id="{{ $tabId }}-title"
            data-bs-toggle="tab"
            data-bs-target="#{{ $tabId }}-content"
            type="button"
            role="tab"
            aria-controls="{{ $tabId }}-content"
            >
            @if($icon)
                <x-mint::icon name="{{$icon}}" class="me-1" />
            @endif
            {{ $title }}
        </button>
    </div>
@endpush

@push("contents-{$hostId}")
    <div @class(['tab-pane fade', 'show active' => $active ?? false])
         id="{{ $tabId }}-content"
         role="tabpanel"
         aria-labelledby="{{ $tabId }}-title">
        {{ $slot }}
    </div>
@endpush

