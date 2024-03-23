## Clonar Proyecto

> <code><comando>git</comando> <accion>clone</accion> </code>

## Instalar bibliotecas nuevas (solo de ser necesario)

1. Para PHP:
    > <code><comando>composer</comando> <accion>update</accion></code>

## Inicar el proyecto

1. Configurar las variables de entorno

    1. En el archivo [.env](.env) (en caso de no tener el archivo, crear una copia de [.env.example](.env.example)) tener establecido las siguientes variables:

        <span style="color: red;">IMPORTANTE!</span>:

        - <strong>APP_ENV</strong>: Dejar en local. Solo se cambia la variable cuando el proyecto está en producción
        - <strong>APP_KEY</strong>: se debe generar con el comando
            > <code><comando>php</comando> <accion>artisan</accion> key:generate</code>
        - <strong>DB_HOST</strong>: Indica la dirección en la que se encuentra alojada la base de datos
        - <strong>DB_PORT</strong>: Indica el puerto en la que se encuentra alojada la base de datos
        - <strong>DB_DATABASE</strong>: Indica el nombre de la base de datos (para este caso devto)
        - <strong>DB_USERNAME</strong>: Indica el usuario para conectarse a la base de datos
        - <strong>DB_PASSWORD</strong>: Indica la contraseña del usuario para conectarse a la base de datos

1. Crear la base de datos.

    - En nuestro administrador de base de datos, ejecutar el comando
        > <code><comando>CREATE</comando> <accion>DATABASE</accion> <argumento>IF NOT EXISTS</argumento> devto</code>

1. Corrar las migraciones con el comando
    > <code><comando>php</comando> <accion>artisan</accion> migrate</code>

1. Ejecutar seeders:
    > <code><comando>php</comando> <accion>artisan</accion> <argumento>db:seed</argumento> --class=UserSeeder</code>
    > <code><comando>php</comando> <accion>artisan</accion> <argumento>db:seed</argumento> --class=ArticuloSeeder</code>

1. Ejecutar Laravel
    > <code><comando>php</comando> <accion>artisan</accion> <argumento>serve</argumento></code>

1. Ingresar a la ruta 127.0.0.1:8000