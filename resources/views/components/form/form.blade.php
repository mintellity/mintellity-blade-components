<form {{ $attributes->class('async-form')->except('enctype') }} enctype="multipart/form-data">
    {{ $slot }}
</form>
