<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalación

Para instalar el proyecto se debe clonar inicialmente el repositorio. Luego ejecutar siguiente comando:

    composer install

Se debe configurar la base de datos editanto el archivo .env y cambiar el nombre a la base de datos que se desea crear

## Migraciones Laravel

Una vez configurada la base de datos, se deben realizar las migraciones con el comando:

    php artisan migrate
    
Luego se poblan la base de datos con el comando seed:

    php artisan db:seed


## Levantar sevidor

Finalmente para levantar el servidor se debe usar el comando:

    php artisan serve
