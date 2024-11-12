# Laravel Class Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/yakovenko/laravel-class-generator.svg?style=flat-square)](https://packagist.org/packages/yakovenko/laravel-class-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/yakovenko/laravel-class-generator.svg?style=flat-square)](https://packagist.org/packages/yakovenko/laravel-class-generator)
[![License](https://img.shields.io/packagist/l/yakovenko/laravel-class-generator.svg?style=flat-square)](https://opensource.org/licenses/MIT)


`yakovenko/laravel-class-generator` - A Laravel package designed to simplify the creation of various class types, including Utility, Service, Trait, Helper, and Enum classes, through Artisan commands. Ideal for Laravel projects of any scale, this package reduces repetitive setup and keeps your codebase organized.

## Installation

### Requirements

- PHP     : >=8.1 (due to enum support)
- Laravel : ^8.0 || ^9.0 || ^10.0 || ^11.0

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

Create a new service class using:

```bash
php artisan yas:service Stand\\Stand
```

This will generate `StandService` in the `App\Services\Stand` directory.

**Generating a Utility**

Create a new utility class with:

```bash
php artisan yas:utility User
```

This command creates `UserUtility` in `App\Utilities`.

**Generating a Helper**

To create a helper class:

```bash
php artisan yas:helper File
```

This creates `FileHelper` in `App\Helpers`.

**Generating a Trait**

To generate a new trait:

```bash
php artisan yas:trait Example
```

This generates `ExampleTrait` in `App\Traits`.

**Generating an Enum**

Easily generate enum classes with the command:

```bash
php artisan yas:enum Status
```

This will create a `StatusEnum` in `App\Enums`, which includes basic functionality, such as `values()` to list all enum values.

**Author**

- **Alexander Yakovenko** - [GitHub](https://github.com/as-yakovenko) - [Email](mailto:paffen.web@gmail.com)