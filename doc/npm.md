## NGINX

NGINX - это проксирующая система, созданная для того чтобы 
принимать запрос к серверу и запускать необходимые программы 
службы или редиректить его другим сервисам.

Помимо nginx сужествует еще и apache. Но apache более сложен
в настройке, а также проигрывает в производительности 
**многопоточному, асинхронному** NGINX. поэтому его мы рассматривать
не будем. 

Для установки nginx используем `sudo apt install nginx`.

Далее устанавливаем nginx, как службу, которая всегда включена
и запускается с системой `sudo systemctl enable nginx`. И включаем
`sudo systemctl start nginx`

Для проверки любого запущенного сервиса в том числе nginx 
используется команда `sudo systemctl status nginx`


Все конфигурации на сервере лежат в `/etc/`, в том числе и
конфигурация сервиса nginx `/etc/nginx`.

Структура папок nginx следующая: 

1. `/etc/nginx/nginx.conf` - настройки сервиса nginx

1. `/etc/nginx/conf.d/` - дополнительные конфигурации сервиса nginx
1. `/etc/nginx/sites-available/` - конфигурации сайтов, которые существуют 
но не активны
   
1. `/etc/nginx/sites-enabled/` - конфигурации сайтов, которые активны

Хорошим примером служит дефолтная конфигурация, которая находится в
`/etc/nginx/sites-available/default`. Рассмотрим его поближе: 

```apacheconf
server {
	listen 80 default_server; # Прослушиваем сервер на 80 порту

	root /var/www/html; # Корневая папка проекта 

	server_name _; # Доменное имя, _ - слушать все домены
    location = / {
        index main.html; # Файл точки входа на главную
    }
	location / { # Точка входа относительно root  
		try_files $uri $uri/ =404; # Ищет файл по uri, если не находит - 404
	}


	location ~ \.php$ { # Если адрес оканчивается на .php 
		include snippets/fastcgi-php.conf; # Подключаем конфигурацию из этого файла

		# Если используется php-fpm или любой другой socket:
		fastcgi_pass unix:/var/run/php/php7.4-fpm.sock; # адрес сокета 
		# если сокет находится на другом сервере:
		fastcgi_pass 127.0.0.1:9000; # удаленный адрес php-fpm на 9000 порту
	}

	# Запрет по регелярному выражению открывать файлы, которые начинаются с .ht
	# concurs with nginx's one
	#
	location ~ /\.ht {
		deny all;
	}
}

```

Для создания конфигурации, создаем файл в 
`nano /etc/nginx/sites-available/crmlite.conf` 
и создаем ссылку на файл
`ln -s /etc/nginx/sites-available/crmlite.conf /etc/nginx/sites-enabled/crmlite.conf`

И перезапускаем nginx `sudo systemctl reload nginx`

//TODO: nginx права  
//TODO: php-fpm права  
//TODO: Глава про безопасность
