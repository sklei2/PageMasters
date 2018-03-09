# BookStore

## Installation

#### General

Clone the repository and install the following dependencies:
  - PHP 7
  - OpenSSL PHP Extension
  - PDO PHP Extenstion
  - Mbstring PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension

Run `composer install`. You should now have all the base packages.

#### Ubuntu

In addition to the above, run `apt install phpunit` *before* running `composer install`. If you see a warning along the lines of <em>cannot create cache directory... or directory is not writable</em>, you will need to run the following commands:
  - `sudo chown -R your_user_name /home/your_user_name/.composer/cache/repo/https---packagist.org`
  - `sudo chown -R your_user_name /home/your_user_name/.composer/cache/files/`

Then run:
  - `wget https://raw.githubusercontent.com/laravel/laravel/master/.env.example`
  - `mv .env.example .env`
  - `php artisan key:generate`

## Run local

To run locally use `php -S localhost:8000 -t public/` or `php artisan serve`.

Blah
