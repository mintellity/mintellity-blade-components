<form {{ $attributes->class('ajax-form')->except('enctype') }} enctype="multipart/form-data">
    @csrf
    {{ $slot }}
</form>
