## Установка PHP и php-fpm

Для запуска php скритов через nginx
используется php-fpm.
Для apache никаких дополнительных модулей не требуется.

Для корректной работы php и php-fpm с mysql,
нужны следующие модули: 

`php7.4-common php7.4-json php7.4-xml php7.4-cli php7.4-fpm php7.4-opcache php7.4-readline php7.4-mysql php-imagick php7.4-curl php7.4-mbstring`

устанавливаем 

Проверяем работу службы `sudo systemctl status php7.4-fpm`.


### Настройка прав 

Для того чтобы php скрипты работали от пользователя,
а не от root, а так же для того чтобы php скрипты не имели
доступа к системным файлам необходимо настроить запуск
php-fpm от имени пользователя от которого будут загружены 
файлы.

Для настройки переходим в конфиг php-fpm 
`sudo nano /etc/php/7.4/fpm/pool.d/www.conf`

И меняем директивы 

```
user dmelnik
group dmelnik
listen.owner = dmelnik
listen.group = dmelnik
```

И перезапускаем службу php7.4-fpm


### Установка composer

Composer - это пакетный менеджер, аналагичный npm.

Устанавливаем в домашней директории ~

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
sudo mv composer.phar /usr/local/bin/composer
```

### Установка mysql

`sudo apt install mysql-server`

Конфигурация безопасности 

`sudo mysql_secure_installation`

Создаем пользователя, от которого будем потом 
создавать базы данных
1. `sudo mysql` - входим в mysql
1. `CREATE USER 'dmelnik'@'localhost' IDENTIFIED BY 'tipira21';` - создаем пользователя dmelnik
1. `GRANT ALL PRIVILEGES ON *.* TO 'dmelnik'@'localhost' WITH GRANT OPTION;` - даем пользователю права на создание таблиц
1. `FLUSH PRIVILEGES;` - перезагружаем права всех пользователей
1. `exit` - выходим из mysql

Теперь можем подключаться к базе данных через PHPStorm

Подключемся через PHPStorm и создаем базу данных
`CREATE DATABASE mydb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`

На этом развертывание mysql окончено
