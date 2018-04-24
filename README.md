# BookStore

## Server Setup

- `sudo su`
- `cd /var/www/html/`
- `git clone https://github.com/sklei2/PageMasters`
- `apt install libapache2-mod-php npm node`
- `a2enmod php7.2`
- `a2enmod rewrite`
- `cd PageMasters`
- `cp laravel.conf /etc/apache2/sites-available/`
- `npm install`
- `composer install`
- `npm run dev`
- `a2ensite laravel.conf`
- `a2dissite 000-default.conf`
- `service apache2 reload`
- `service apache2 restart`

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

## Database Setup
### Create Database From Scratch
First you need to create the database in MySQL and setup the environment:
- log in to MySQL Server
- create a database. By default we expect the name to be `PageMasters`, but that's up to you
- Open the `.env` file
- insert the information about the MySQL Database
    - Host
    - Port
    - Database Name
    - Database passord

Save the `.env` file. **Do *not* commit this**. The `.env` file is for your own system configuration

### Initialize Setup Database
To initialize the database with some initial values enter the following:
-`php artisan migrate:fresh`
-`php artisan db:seed`

If  `php artisan db:seed` gives the error `Class ????TableSeeder does not exist` run the following:
-`composer dump-autoload` 
Then run the initialize commands again.

## Run local

To run locally use `php -S localhost:8000 -t public/` or `php artisan serve`.

Blah
