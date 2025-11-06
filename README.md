# 🚀 Laravel + PostgreSQL + PHP + Nginx — Docker Compose Setup

> Готовая инфраструктура для быстрого запуска Laravel-приложения в Docker с Nginx и PostgreSQL.  
> Идеально подходит для разработки и продакшн-деплоя.

---

## 🧱 Стек технологий
```
| Компонент      | Описание |
|----------------|-----------|
| 🐘 **PHP / Laravel** | Фреймворк для разработки мощных backend-приложений |
| 🐳 **Docker Compose** | Контейнеризация и оркестрация |
| 🌐 **Nginx** | Веб-сервер и реверс-прокси |
| 🐘 **PostgreSQL** | Основная реляционная база данных |
| 🧰 **Composer** | Управление зависимостями PHP |
```
---

### 📂 Структура проекта
```
├── docker-compose.yml
├── nginx/
│ └── default.conf
├── laravel/
│ ├── app/
│ ├── bootstrap/
│ ├── config/
│ └── ...
├── php/
├──── Dockerfile
└── .env
├──docker-compose.yml
```
---

### NGINX - запиши в него (в директории)
```
server {
    listen 80;
    index index.php index.html;
    server_name localhost;
    root /var/www/public; // для windows root /var/www/html/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass app:9000; 
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
---
### PHP - запиши в него (в директории)
```
FROM php:8.2-fpm

# install setup dependences
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl libpq-dev \
    && docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
```

###🐳 Полезные команды Docker Compose
```

| Команда | Описание |
|----------|-----------|
| `docker-compose up -d --build ` | Запустить проект |
| `docker-compose down` | Остановить и удалить контейнеры |
| `docker-compose exec app php artisan migrate` | Применить миграции |
| `docker-compose exec app php artisan tinker` | Открыть консоль Laravel |
| `docker-compose logs -f` | Просмотр логов в реальном времени |

```


---

## ⚙️ Настройка и запуск

## Инструкция 
1️⃣ Клонируйте репозиторий
```
bash
git clone https://github.com/Viacheslav1998/lara-bridge-api.git
cd laravel

2️⃣ Создайте .env файл
Пример содержимого .env:
APP_NAME=Laravel
APP_ENV=local
APP_KEY=генерируй свой 
APP_DEBUG=true
APP_URL=http://localhost:8080

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel

SESSION_DRIVER=database 
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"


3️⃣ Запустите контейнеры
docker-compose up -d --build

windows
winpty docker exec -it lara_bridge_app bash
composer install
composer update

Linux
docker exec -it lara_bridge_app bash
composer install

И Сгенерируйте ключ приложения
php artisan key:generate

дать права доступа
1 - cd laravel 
2 - sudo chmod -R 777 storage bootstrap/cache
```

### 🐳 docker-compose.yaml (для windows поменяй ./laravel:/var/www/ на ./laravel:/var/www/html)
```
services:
  app:
    build:
      context: ./php
    container_name: lara_bridge_app
    working_dir: /var/www
    volumes:
      - ./laravel:/var/www
    networks:
      - lara_bridge_net
      
  nginx:
    image: nginx:latest
    ports:
      - "8080:80"
    volumes:
      - ./laravel:/var/www
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - app
    networks:
      - lara_bridge_net

  postgres:
    image: postgres:15
    restart: unless-stopped
    environment:
      POSTGRES_USER: laravel
      POSTGRES_PASSWORD: laravel
      POSTGRES_DB: laravel
    ports:
      - "5433:5432"
    volumes:
      - lara_bridge_pgdata:/var/lib/postgresql/data
    networks:
      - lara_bridge_net

  pgadmin:
    image: dpage/pgadmin4
    environment:
      PGADMIN_DEFAULT_EMAIL: admin@local.dev
      PGADMIN_DEFAULT_PASSWORD: admin
    ports:
      - "5050:80"
    networks:
      - lara_bridge_net

networks:
  lara_bridge_net:

volumes:
  lara_bridge_pgdata:

```
