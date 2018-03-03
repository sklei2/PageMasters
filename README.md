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
 - MySQL Server
You have to install the packages via apt-get or something similar.

Run composer install. you should now have all the base packages

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

`php artisan migrate`

`php artisan db:seed`

## Run local

To run locally use:
php -S localhost:8000 -t public/

