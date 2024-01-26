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

### Toggle (Checkbox Switche)
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#switches)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#flexSwitchCheckDefault)

```php
<x-mint::form.toggle name="name" />
```

### Switch (Radio)
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#switches)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-switches.html)

```php
<x-mint::form.switch name="name" />
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
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#formFile)

```php
<x-mint::form.file name="name" />
```

### Textarea
Automatic height resizing depending on content. Needs [textarea.js](../resources/js/textarea.js)

```php
<x-mint::form.textarea name="name" />
```

### Date
Using [Pikaday](https://github.com/Pikaday/Pikaday)

```php
<x-mint::form.date name="name" />
```

### Time

```php
<x-mint::form.time name="name" />
```

### Color
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/form-control/#color)

```php
<x-mint::form.color name="name" />
```
