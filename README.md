## Sistema de Regalias Mineras y Salida de Mineral Formulario 101

1.- comandos para instalar
composer install
npm install
php artisan key:generate
php migrate --seed

--Linux
rm public/storage
php artisan storage:link

--Windows
rmdir public\storage
php artisan storage:link

php artisan optimize:clear

2.- Version PHP 8.1
3.- Version Laravel 10.28.0
4.- Version de postgres 15
