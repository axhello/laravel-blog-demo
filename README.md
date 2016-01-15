# laravel-blog
Laravel博客演示
### Usage

1.克隆或者下载到你的服务器
```
git clone https://github.com/melifes/laravel-blog.git
```

2.修改目录下的.env文件,配置你的mysql
```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

3.修改目录为可写,在目录下执行
```
sudo chmod -R 755 storage/
```

4.执行填充数据库
```
php artisan migrate
```

```
php artisan db:seed
```

5.配置你的nginx虚拟主机文件
参考...