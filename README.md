### Установка

Установить php 7.6+, MySql, composer

cd /xampp/htdocs/

git clone https://github.com/UP-G/authandcrudLavarel9 folder

cd folder

composer install

define database, APP_KEY in.env

php artisan migrate --seed

php artisan serve

### Admin создание/Вход

Выполнить запрос в БД

insert into `users` (`name`, `email`, `phone`, `password`, `updated_at`, `created_at`) values ('Admin', 'Test123@gmail.com', 'adminka' , '$2y$10$9feY4beTfExN/RwVbEC3xuQs5C.XbILmGGEN54Cu0ep/MhpLW/LWS', '2022-02-10 10:51:57', '2022-02-10 10:51:57')

После нажать на кнопку "вход", Email: Test123@gmail.com Пароль: 12345678



