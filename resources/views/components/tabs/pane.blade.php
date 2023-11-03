@props([
    'id' => 'tab-pane-' . Str::random(8),
    'title',
    'active' => false,
])

@push('titles')
    <button
        @class(["nav-link", "active" => $active ?? false])
        id="{{ $id }}-title"
        data-bs-toggle="tab"
        data-bs-target="#{{ $id }}-content"
        type="button"
        role="tab"
        aria-controls="{{ $id }}-content"
        aria-selected="{{ json_encode($active ?? false) }}">
        {{ $title }}
    </button>
@endpush

@push('contents')
    <div @class(['tab-pane fade', 'show active' => $active ?? false])
         id="{{ $id }}-content"
         role="tabpanel"
         aria-labelledby="#{{ $id }}-title">
        <div class="card">
            {{ $slot }}
        </div>
    </div>
@endpush

