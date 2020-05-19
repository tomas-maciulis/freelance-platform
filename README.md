# freelance-platform
Basic website made for posting and finding freelance job ads.

## Requirements
PHP 7.2\
MySQL 14.14 (recommended but any other SQL management system supported by Laravel 7.1.3 could be used)\
Apache 2 (recommended but any other web server could be used)\
composer\
npm

## Installation
Create new empty database in (My)SQL management system.\
Duplicate and rename `.env.example` to `.env`.\
Configure database and website settings in `.env` file.

Install PHP dependencies
```
composer install
```
Install Javascript dependencies
```
npm install
```
Build public Javascript file
```
npm run dev
```
Compile custom css for Tailwind CSS
```
npm run compile:css
```
Create required tables in database
```
php artisan migrate
```
\
Configure web server of your choice to point to `/public`  folder.

## Populate database with data
Optionally, you can populate database with randomized data, mainly for testing purposes.
```
php artisn db:seed
```
