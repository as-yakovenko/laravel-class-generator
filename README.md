# Laravel Class Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/yakovenko/laravel-class-generator.svg?style=flat-square)](https://packagist.org/packages/yakovenko/laravel-class-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/yakovenko/laravel-class-generator.svg?style=flat-square)](https://packagist.org/packages/yakovenko/laravel-class-generator)
[![License](https://img.shields.io/packagist/l/yakovenko/laravel-class-generator.svg?style=flat-square)](https://opensource.org/licenses/MIT)


`yakovenko/laravel-class-generator` - A Laravel package to generate Utility, Service, Trait, and Helper classes with ease.

## Installation

### Requirements

- PHP               : >=8.0
- Laravel           : ^8.0 || ^9.0 || ^10.0 || ^11.0

You can install the package via Composer:

```bash
composer require yakovenko/laravel-class-generator
```

or add the repository to your project's `composer.json` file:

```bash
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/as-yakovenko/laravel-class-generator"
    }
],
```

**Registration provider**

You need to add your service provider to the providers array in your Laravel application's ```config/app.php``` file:

```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Yakovenko\LaravelClassGenerator\LaravelClassServiceProvider::class,
],
```

### Usage

**Generating a Service**
To generate a new service class, use the following Artisan command:

```bash
php artisan yas:service Stand\\Stand
```

This will create a `StandService` class in the `App\Services\Stand` directory.

**Generating a Utility**
To generate a new utility class, use the following Artisan command:

```bash
php artisan yas:utility User
```

This will create a `UserUtility` class in the `App\Utilities` directory.

**Generating a Helper**
To generate a new helper class, use the following Artisan command:

```bash
php artisan yas:helper File
```

This will create a `FileHelper` class in the `App\Helpers` directory.

**Generating a Trait**

To generate a new trait class, use the following Artisan command:

```bash
php artisan yas:trait Example
```

This will create an `ExampleTrait` class in the `App\Traits` directory.

**Author**

- **Alexander Yakovenko** - [GitHub](https://github.com/as-yakovenko) - [Email](mailto:paffen.web@gmail.com)