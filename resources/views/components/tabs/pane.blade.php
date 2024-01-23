@props([
    'id' => 'tab-pane-' . Str::random(8),
    'title',
    'active' => false,
    'icon' => false
])

@push('titles')
    <div class="nav-item" role="presentation">
        <button
            @class(["nav-link", "active" => $active ?? false])
            id="{{ $id }}-title"
            data-bs-toggle="tab"
            data-bs-target="#{{ $id }}-content"
            type="button"
            role="tab"
            aria-controls="{{ $id }}-content"
            aria-selected="{{ json_encode($active ?? false) }}">
            @if($icon)
                <x-mint::icon name="{{$icon}}" class="me-1" />
            @endif
            {{ $title }}
        </button>
    </div>
@endpush

@push('contents')
    <div @class(['tab-pane fade', 'show active' => $active ?? false])
         id="{{ $id }}-content"
         role="tabpanel"
         aria-labelledby="#{{ $id }}-title">
        {{ $slot }}
    </div>
@endpush

