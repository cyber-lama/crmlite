## Развертывание 

Клонируем репозиторий `git@github.com:laravel/laravel.git`

Устанавливаем зависимости `composer install`

Переименовываем .env.example в .env `mv .env.example .env`

Генерируем ключ `php artisan key:generate`

Запускаем миграции `php artisan migrate`
