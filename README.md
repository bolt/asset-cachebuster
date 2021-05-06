# Bolt Asset Cachebuster Extensions

Author: Ivo Valchev

A Bolt 4/5 extension to bust cache for your assets

## What does it do?

Adds a version cachebuster to your Twig assets.

```twig
<link rel="stylesheet" href="{{ asset('styles.css') }}" />
```

Will output something like:

```html
<link rel="stylesheet" href="/theme/your-theme/styles.css?v=0feef7" />
```

The version string is a hashed substring of your `APP_SECRET`.
Therefore, whenever you need bust the cache, simply run:

```bash
php bin/console bolt:reset-secret
```

## Installation

```bash
composer require bolt/asset-cachebuster
```

## Running PHPStan and Easy Codings Standard

First, make sure dependencies are installed:

```
COMPOSER_MEMORY_LIMIT=-1 composer update
```

And then run ECS:

```
vendor/bin/ecs check src
```
