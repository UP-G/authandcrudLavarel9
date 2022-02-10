### Установка

Установить php 7.6+, MySql, composer

cd /xampp/htdocs/

git clone https://github.com/UP-G/authandcrudLavarel9 folder

cd folder

composer install

define database, APP_KEY in.env

php artisan migrate --seed

php artisan serve



