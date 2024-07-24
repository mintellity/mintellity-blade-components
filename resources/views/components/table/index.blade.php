@php
    $tableAttributes = $attributes->prefixed('table');
    $wrapperAttributes = $attributes->notPrefixed('table');
@endphp

<div {{ $wrapperAttributes->class('table-responsive') }}>
    <table {{ $tableAttributes->class('table align-middle table-row-dashed fs-6 gy-5 mb-0') }}>
        {{ $slot }}
    </table>
</div>
