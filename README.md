## Sistema de Regalias Mineras y Salida de Mineral Formulario 101

-- comandos para instalar

-   composer install
-   npm install
-   php artisan key:generate
-   php artisan migrate --seed

-- Linux

-   rm public/storage
-   php artisan storage:link

-- Windows

-   rmdir public\storage
-   php artisan storage:link

# Pasos para instalar en el servidor

-- php artisan migrate:fresh
-- php artisan db:seed
-- php artisan optimize:clear

-   Version PHP 8.1
-   Version Laravel 10.28.0
-   Version de postgres 15

# Posibles configuraciones en consola para VITE
