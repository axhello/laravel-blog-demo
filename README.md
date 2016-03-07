# laravel-blog
Laravel博客演示

### Usage

1.克隆或者下载到你的服务器
```
git clone https://github.com/melifes/laravel-blog.git
```

2.把`.env.example`文件改成`.env`文件,配置你的mysql数据库,修改以下
```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

3.修改目录为可写,在目录下执行
```
chmod -R 755 storage/
```

4.执行填充数据库
```
php artisan migrate
```

```
php artisan db:seed
```

默认登录账户是 `admin@admin.com` 密码 `admin12345`

5.配置你的nginx虚拟主机文件,参考...
```
server {
    listen 80;
    #listen 443 ssl;
    charset utf-8;
    server_name blog.ciyuanai.net;
    root /home/laravel-blog/public;

    index index.php index.html index.htm;
    
    #ssl_certificate     /etc/nginx/ssl/laravel.dev.crt;
    #ssl_certificate_key /etc/nginx/ssl/laravel.dev.key;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        #fastcgi_pass 127.0.0.1:9000;
        fastcgi_pass  unix:/tmp/php-cgi.sock;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #include fastcgi_params;
        include fastcgi.conf;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
