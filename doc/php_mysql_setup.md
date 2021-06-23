## Установка PHP и php-fpm

Для запуска php скритов через nginx
используется php-fpm.
Для apache никаких дополнительных модулей не требуется.

Для корректной работы php и php-fpm с mysql,
нужны следующие модули: 

`php7.4-common php7.4-json php7.4-xml php7.4-cli php7.4-fpm php7.4-opcache php7.4-readline php7.4-mysql php-imagick`

устанавливаем `sudo apt install php7.4-common php7.4-json php7.4-xml php7.4-cli php7.4-fpm php7.4-opcache php7.4-readline php7.4-mysql php-imagick`

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




