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

```php
<x-mint::form.checkbox name="name" />
```

### Toggle / Switch
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#switches)

```php
<x-mint::form.toggle name="name" />
```

### Select
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/select/)

```php
<x-mint::form.select name="name" :options="['value' => 'Name']" />
```

### Radio
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#radios)

```php
<x-mint::form.radio name="name" />
```

### File
[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/form-control/#file-input)

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
