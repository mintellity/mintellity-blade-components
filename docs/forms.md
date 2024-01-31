# Asynchronous Form-Validation
Requires [async-form.js](../resources/js/async-form.js).

To use asynchronous form-validation ("Ajax-Form"), you need to add the `AsyncFormRedirectMiddleware` to the àpp/Http/Kernel.php`-file:

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Mintellity\BladeComponents\Http\Middleware\AsyncFormRedirectMiddleware::class
    ],
];
```

Then you can use the form component to asynchronously validate the form and display the errors:

```html
<x-mint::form action="{{ route('route') }}" method="post">
    <x-mint::form.input name="name" label="Name" />
    ...
</x-mint::form>
```

# Form-Inputs
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/overview/)

```php
<x-mint::form.input name="name" label="Betrag" value="100">
    <x-mint::form.input.prepend>Ab</x-mint::form.input.prepend>
    <x-mint::form.input.append>€</x-mint::form.input.append>
</x-mint::form.input>
```
## Attributes

| Attribute | Description                                                           |
|-----------|-----------------------------------------------------------------------|
| name      | "name"-attribute of the input element, also used for the id attribute |

## Optional Attributes

| Attribute | Description |
|-----------|-------------|
| accept    |             |
| disabled  |             |
| readonly  |             |
| hint      |             |
| Label     |             |
| max       |             |
| min       |             |
| required  |             |
| step      |             |
| type      |             |
| value     |             |


## Other Input types

### Checkbox
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#defaultCheck1)

```php
<x-mint::form.checkbox name="checkbox" :items="['value1' => 'Name 1', 'value2' => 'Name 2']" />
```

### Toggle
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#switches)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#flexSwitchCheckDefault)

```php
<x-mint::form.toggle name="name" />
```

### Switch
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-switches.html)

```php
<x-mint::form.switch name="name" />
```
#### Synced Switches
```php
<div class="switches-stacked">
    <x-mint::form.switch name="name" sync />
    <x-mint::form.switch name="name" sync />
</div>
```

### Select
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/select/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#exampleFormControlSelect1)

```php
<x-mint::form.select name="name" :options="['value' => 'Name', 'value2' => 'Name2']" />
```

### Radio
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#radios)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#defaultRadio1)

```php
<x-mint::form.radio name="name" :items="['value1' => 'Option 1', 'value2' => 'Option 2']" />
```

### File
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/form-control/#file-input)

```php
<x-mint::form.file name="name" />
```

### Textarea
Automatic height resizing depending on content. Requires [textarea.js](../resources/js/textarea.js) and [textarea.css](../resources/css/textarea.css).

```php
<x-mint::form.textarea name="name" />
```

### Date
Using [Pikaday](https://github.com/Pikaday/Pikaday). Requires [datepicker.js](../resources/js/datepicker.js) and [datepicker.css](../resources/css/datepicker.css).

```php
<x-mint::form.date name="name" />
```

### Time
Using [Pikaday](https://github.com/Pikaday/Pikaday)

```php
<x-mint::form.time name="name" />
```

### Color
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/form-control/#color)

```php
<x-mint::form.color name="name" />
```
