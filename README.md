## Instrucciones de despliegue

1. Tener instaladas en el computador las siguientes tecnologías:
- PHP versión 8 
- Laravel Framework 9.35.1
- Tener instalado el composer (https://getcomposer.org/download/)
- Node.js 16.28.0
- Se recomienda el IDE: Visual Studio Code
- Xampp, con Apache y MySQL Versión 3.30


2. En cuanto a la adapatación:
- Copiar el archivo .env.example y renombrarlo a .env
- Cambiar en el archivo .env todos los datos correspondientes al ambiente en que se va a desplegar el aplicativo; en especial el nombre de la base de datos que en este caso, debe ser: proyectoinnovarenti y el nombre del motor de bases de datos debe ser: mysql
- En la terminal, ubicados en la locación del proyecto: ```composer install```
- En la terminal: ```npm install```
- En la terminal: ```npm run dev``` (Puede que la primera vez que se ejecute aparezca un error. Se soluciona volviendo a correr este mismo comando).
- Se crea una base de datos vacía en el motor de base de datos de MySQL con el nombre:  proyectoinnovarenti
- Correr las migraciones con el comando ```php artisan migrate```. 
- Para correr los seeders: ```php artisan migrate:refresh --seed```.
- Para correr el proyecto, se corre el comando ```php artisan serve```.
- Tener en cuenta: 
    1. Para registrar instituciones educativas, solo hacer el registro para Colombia, dado que la base de datos encontrada no tiene todos los países, todos lo estados, pero NO todas las ciudades.
    2. Cualquier duda, estaremos pendientes, correo: ptabordam@unal.edu.co

