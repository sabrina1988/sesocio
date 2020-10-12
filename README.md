# sesocio

## Instalación

Crear el archivo `.env` 
```sh
$ cp .env.example .env
``` 

Modificar las entradas del archivo `.env` cons los datos correspondientes.
```dotenv

DB_DATABASE
DB_USERNAME
DB_PASSWORD

```

Instalar las dependencias de laravel para el backend
```sh
$ composer install
```

Generar la clave para encriptar la aplicación
```sh
$ php artisan key:generate
``` 

Instalar las dependencias del Front-end
```sh
$ npm install
```

Copiar las dependencias a la carpeta `public` 
```sh
$ npm run dev
```

Correr las migraciones con los seeders
```sh
php artisan migrate:fresh --seed
```
