# Laravel view shrinker

[English](README.md)|[中文](README-zh.md)

## What is?

Laravel view shrinker is a simple but effective `laravel framework`  extension package.

It provider a view compiler,it would performs compression operations similar to twig's `%spaceless` function when compile&caching `Blade` views.

Thus completing `%spaceless` function at compile time to avoiding reading larger files of cache at runtime, it's helpful to enhance speed  of view rendering.

## How to

### Install

```bash
composer install "hidehalo/laravel-view-shrinker"
```

### Usage

Laravel will automatically register its service provider, override the default blade compiler, there have no more additional configuration.

### Testing

```bash
./vendor/bin/test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
