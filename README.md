#Comic store con Laravel

##Contenido

---

Este proyecto es una tienda online de comics, con la sección de panel de control.

Todo realizado con [Laravel](https://laravel.com/)


## Instalación

---

1. Dentro de la carpeta donde tienes alojado el proyecto tienes que ejecutar el siguiente comando

~~~
composer install
~~~

2. Luego tienes que crear una base de datos de MySQL
                                    

3. Debes realizar una copia del archivo `.env.example` y nombrarlo `.env`


4. Ahora tienes que ejecutar el comando de Artisan que te creara launa "key" 
   aleatoria, el cual es:

~~~
php artisan key:generate
~~~

5. Dentro del archivo `.env` que copiaste, tienes que **modificar los siguientes
   datos** para que concuerden con los de tu base de datos

~~~
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
~~~
       
6. Ahora hay que ejecutar las `migrations` y `seeders`

~~~ 
php artisan migrate --seed
~~~ 

5. Y para finalizar es necesario **recrear el symlink** para el storage. Para esto hay que **ejecutar el siguiente comando** de Artisan

~~~ 
php artisan storage:link
~~~ 
