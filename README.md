<h1>register-portal</h1>

<h2>Introducción</h2>

**Inicio de sesión y formulario**

Práctica de la asignatura DAW2 donde se pide desarrollar un portal con registro de usuarios que acceden a un formulario, cuya información, una vez formalizado, se grabará en una base de datos.

<h2>Tecnologías utilizadas</h2>

* **Framework**: Laravel (v8.28.1)
* **Base de datos**: MySQL (> v5.7)
* **Lenguajes de programación**: PHP (> v7.4)
* **PaaS**: Heroku

<h2>Base de datos</h2>

En el fichero `.env` se han de declarar las variables de conexión a la base de datos:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=register_portal_bd
DB_USERNAME=root
DB_PASSWORD=password123
```

Y ejecutar: `php artisan migrate`


<h2>Heroku</h2>

http://app-register-portal.herokuapp.com/

* Usuario de prueba: prueba@gmail.com
* Contraseña: password

<h2>Referencias</h2>

* Tutorial Authentication con Laravel: [enlace](https://youtu.be/UGW01ttsfpQ)
