# freelance-platform
Basic website made for posting and finding freelance job ads.

## Installation
Create new empty database in any SQL management system that Laravel supports.
Duplicate and rename `.env.example` to `.env`.
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

Configure web server of your choice to point to `/public`  folder.

## Populate database with data
Optionally, you can populate database with randomized data, mainly for testing purposes
```
php artisn db:seed
```
