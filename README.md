# laravel-pinba

## Description

Integrates [Pinba](http://pinba.org/ "Pinba site")
with [Laravel](https://laravel.com/ "Laravel site").

## Installation

Use composer to install:

    composer require Sannis/laravel-pinba

## Installation

Require this package with composer:

    composer require sannis/laravel-pinba

After updating composer, add the `\Sannis\Pinba\ServiceProvider::class` to the providers array in config/app.php

> If you use a catch-all/fallback route, make sure you load the Pinba ServiceProvider before your own App ServiceProviders.

Copy the package config to your local config with the publish command:

    php artisan vendor:publish --provider="\Sannis\Pinba\ServiceProvider"
