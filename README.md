# Sistema de email de facturas
Es un sistema fácil de envio de facturas a tus clientes

## Instalación
1. Importa la base de datos de la carpeta DB
1. Clonar repositorio en tu host
1. Crear el archivo /functions/dataemail.php y completa la info para enviar correos
~~~
<?php 
    function emailHost(){
        return 'completaData';
    }
    function emailUsername(){
        return 'completaData';
    }
    function emailPassword(){
        return 'completaData';
    }
?>
~~~

## Datos del Proyecto

### Refactorizar / Mejorar

* connectDB() in Login
* Mostrar representates de la empresa a quienes se les enviará el correo
* Refactorizar sendemail.php
* Crear hoja de estilos
* Crear scripts para mejor interacción
* Refactorizar las páginas iniciales
* Completar CRUD Companies
* CRUD Representantes
* Relacionar Companies, Representanes con la Vista, el Rol siempre va a ser client (3)
* Crear un buen diseño de consulta correcta! todo ok! Insertado Correctamente!