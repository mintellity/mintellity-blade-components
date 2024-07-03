<form {{ $attributes->class('ajax-form')->merge(['enctype' => "multipart/form-data"]) }}>
    @csrf
    {{ $slot }}
</form>
