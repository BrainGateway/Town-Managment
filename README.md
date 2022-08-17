
<p  align="center"><a  href="https://cartlow.com"  target="_blank"><img  src="https://cartlow.com/web-assets/img/home/logo-cartlow.svg"  width="400"></a></p>



<p  align="center">

<a  href="https://travis-ci.org/laravel/framework"><img  src="https://travis-ci.org/laravel/framework.svg"  alt="Build Status"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/dt/laravel/framework"  alt="Total Downloads"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/v/laravel/framework"  alt="Latest Stable Version"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/l/laravel/framework"  alt="License"></a>

</p>



## Installation Guide

    git clone git@github.com:cartlow/cartlow-bootstrap.git

    composer install

    npm install --global npm@latest

```
cp .env.example .env
```
    php artisan key:generate
```
npm run dev
```


Roles and Permission Database Tables project dependent.
### Set PERMISSION_PREFIX in .env file for table_prefix
### Set USER_LEVEL in .env file for user level, eg. god: admin, shop: seller etc.
### Go to App/config/permission.php
### Make a change in DATETIME_create_permission_tables.php  migration name so it can be updated in database

``` 
php artisan migrate
```
```
 php artisan optimize:clear
 ```
 ```
 php artisan config:clear
 ```

For Default Roles and Permission 
run command:
```
php artisan db:seed
```
For installation Clickhouse Server Follow  below Link:
https://clickhouse.com/

we are using bavix/laravel-clickhouse in laravel
for documentation foloow below link:

https://github.com/bavix/laravel-clickhouse


for sweet alerts follow below link:
https://realrashid.github.io/sweet-alert/





