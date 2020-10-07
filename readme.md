# LaravelStarter

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require --dev ayctor/laravel-starter
```

## Usage

You can install the starter presets with interactive questions.

``` bash
$ php artisan starter:install
```

Or you can install the starter presets with direct options. Check the --help option for the list of available presets.

``` bash
$ php artisan starter:install --auth=fortify --ui=vue,inertia
```

Finally, you can just install the basic starter presets without options and interactive questions.

``` bash
$ php artisan starter:install --no-interaction
```

## Presets

### Basic

The basic presets contains the following packages:

- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
- [nunomaduro/larastan](https://github.com/nunomaduro/larastan)
- [laravel/telescope](https://github.com/laravel/telescope)
- [squizlabs/php_codesniffer](https://github.com/squizlabs/php_codesniffer)
- [tailwindlabs/tailwindcss](https://github.com/tailwindlabs/tailwindcss)

And some other stuff like Bitbucket Pipelines config, Gitlab Pipelines config, SVG blade component, eslint, GTM config, etc.

### Admin

#### Nova

Make sure you have your **auth.json** file setup with your authentication data.

Check the documentation to customize the default setup: [https://nova.laravel.com/docs/3.0/resources/](https://nova.laravel.com/docs/3.0/resources/)

### Auth

#### Fortify

Check the documentation to customize the default setup: [https://github.com/laravel/fortify/blob/1.x/README.md](https://github.com/laravel/fortify/blob/1.x/README.md)

#### Sanctum

Check the documentation to customize the default setup: [https://laravel.com/docs/8.x/sanctum#issuing-api-tokens](https://laravel.com/docs/8.x/sanctum#issuing-api-tokens)

### Tracking

#### Bugsnag

Create your project in Bugsnag and add the given API key into your .env file.

#### Sentry

Create your project in Sentry and add the given DSN key into your .env file.

### Backup

#### Spatie Backup

Check the documentation to customize the default setup: [https://spatie.be/docs/laravel-backup/v6/installation-and-setup](https://spatie.be/docs/laravel-backup/v6/installation-and-setup)

### API

#### GraphQL

???

### UI

#### Vue

This preset bring with vue, webpack loader and eslint plugin. You can easily add your components in the resources/js/bootstrap.js file.

### Packages

#### Spatie Media Library

Check the documentation to install required optimization tools: [https://spatie.be/docs/laravel-medialibrary/v8/installation-setup#optimization-tools](https://spatie.be/docs/laravel-medialibrary/v8/installation-setup#optimization-tools)

Check the documentation to customize the default setup: [https://spatie.be/docs/laravel-medialibrary/v8/basic-usage/preparing-your-model](https://spatie.be/docs/laravel-medialibrary/v8/basic-usage/preparing-your-model)

#### Spatie Permission

Check the documentation to customize the default setup: [https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage](https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage)

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email us instead of using the issue tracker.

## Credits

- [Axel Charpentier](https://github.com/thedevgrizzly)

## License

Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ayctor/laravel-starter.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ayctor/laravel-starter.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/ayctor/laravel-starter
[link-downloads]: https://packagist.org/packages/ayctor/laravel-starter
[link-styleci]: https://styleci.io/repos/12345678
