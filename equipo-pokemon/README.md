## AUTOR: SANTIAGO MARTÍNEZ BOTA
## URL REMOTO:  [equipo-pokemon](http://smartinez.ifc33b.cifpfbmoll.eu/laravel_pruebas-santimb96/equipo-pokemon/public/pokemons)
## REPOSITORIO: [repo](https://github.com/DAW-presencial/laravel_pruebas-santimb96/tree/main/equipo-pokemon)
## QUÉ ENCONTRARSE:

El evaluador se encontrará un simple CRUD con temática Pokémon, la cual cumple con todos los puntos detallados en la práctica menos los commits asociados a cada apartado.

Hay datos por defecto en el seeder y en el store(comentados aquí). Las gates se encuentran definidas en el `AuthServiceProvider` en `app/Providers` y la autenicación pasa
por el role del usuario registrado:

#### USUARIO PREDETERMINADO: adminadminer@gmail.com
#### CONTRASEÑA: administrador

Si no se está logueado o no es con el administrador, no dejará borrar, crear o editar; sólo mostrará los datos
usando métodos `@can('isAdmin')`.

Al hacer login o register, se redirige a la página index.

La release la encontrarás en el mismo repositorio.

Cualquier cosa, contáctame por WhatsApp o por correo (smartinez@cifpfbmoll.eu)

## .env: 
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:eseMBkDwUoi/ol6F2v7WT0ivyLxpjM7j1gagsVtnw/I=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=51.178.152.213
DB_PORT=5432
DB_DATABASE=smartinez-crono
DB_USERNAME=smartinez_usr
DB_PASSWORD=abc123.

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
