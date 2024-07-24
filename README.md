# Bootstrap CSS Blade component for Laravel

## Installation & Requirements

This package requires:
- Craft by Keenthemes (https://preview.keenthemes.com/craft/) ->Bootstrap 5, jQuery
- Font-Awesome (https://fontawesome.com/)
- Pikaday (https://github.com/Pikaday/Pikaday)

You can install the package via composer:

```bash
composer require mintellity/blade-components
```

Some components depend on further npm libraries. We bundled them in the package.json file. You can install them via npm:

```bash
npm install ./vendor/mintellity/blade-components
```

And then require the js and css files in your app.js and app.scss files:

```scss
// app.css
@import '../../../node_modules/mintellity-blade-components/resources/css/index.css';
```

```js
// app.js
require('../../node_modules/mintellity-blade-components/resources/js/index');
```

## Usage

The following components are available in this package:

- [Accordion](docs/accordion.md)
- [Badges](docs/badges.md)
- [Buttons](docs/buttons.md)
- [Dropdown](docs/dropdown.md)
- [Form-Inputs](docs/forms.md)
- [Icon](docs/icon.md)
- [Modal](docs/modal.md)
- [Tables](docs/tables.md)
- [Tabs](docs/tabs.md)

## Credits

- [Mintellity GmbH](https://github.com/mintellity)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
