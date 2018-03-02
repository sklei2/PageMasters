# BookStore

## Installation

Git clone.
Be sure to have PHP 7 installed on your dev environment
You also need:
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension
You have to install the packages via apt-get or something similar.

Run composer install. you should now have all the base packages

## Database Setup

To initialize the database with some initial values enter the following:
php artisan migrate
php artisan db:seed

## Run local

To run locally use:
php -S localhost:8000 -t public/

