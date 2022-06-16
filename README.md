# error log 検証

## composer install

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php74-composer:latest \
    composer install --ignore-platform-reqs
```

## 起動

```sh
docker-compose up -d
```

## 初期設定

```sh
docker-compose exec laravel.test php -r "copy('.env.example', '.env');"
docker-compose exec laravel.test php artisan key:generate
```

## リクエスト先

web: `http://localhost/error`  
api: `http://localhost/api/error`

## ログ

```sh
less ./storage/logs/laravel.log
```
