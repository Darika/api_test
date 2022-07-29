
## :scroll: **Installation**
Copy `.env.example` with new name `.env` and edit it according to your configuration (ex.: pgsql username/password)

```
> composer install
> php artisan key:generate
> php artisan jwt:secret
> php artisan migrate
> npm install
> npm dev | yarn watch
```

## Commands

Генерация документации по API - Swagger
```
> php artisan l5-swagger:generate --all

or

> composer run-script swagger
```
