Instalación
-----------

Para clonar el proyecto utiliza el siguiente comando
```bash
git https://github.com/dionisus18/redcapital-test.git
```

Este proyecto cuenta con un docker.yml, asi que recomiendo seguir la instalacion basandose en la imagen propocionada, no necesitamos tener nada instalado, solo docker en cualquier OS

Primero debemos realizar una instacia temporal para poder correr composer e instalar laravel/sail que sera nuestro contenedor de desarrollo

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```


Ahora tendremos acceso a los comandos con sail, podemos iniciar el contenedor, demorara un poco la primera vez, ademas debemos de abrir otra instancia del terminal para continuar con la instalacion

```bash
./vendor/bin/sail up
```

Recomiendo crear un alias para la instancia actual del terminal, se entiende entonces que todos los comandos corren con este alias

```bash
alias sail='bash vendor/bin/sail'
```

Copiamos las varias de entorno para que pueda iniciar nuestra aplicacion y generamos las llaves correspondientes

```bash
cp .env.example .env && sail artisan key:generate
```
luego editar el .env y asegurarse que no hayan conflictos con otras bases de datos anteriores y cosas asi
```bash
//Nota este comando elimina el volumen del contedor.

// si ya existe la base de datos recomiendo usar sail mysql

sail down -v
-----
sail up
```

Generamos las migraciones y seeders para testing

```bash
sail artisan migrate:fresh --seed
```
por ultimo creamos el simbolik link
```bash
sail artisan storage:link
```
