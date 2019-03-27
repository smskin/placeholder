# Placeholder generation service

Docker ready project for generation placeholder images.
Docker containers:
- nginx
- php-fpm

The service generates an image based on the passed parameters:
- txt - Text
- txtsize - Text font size
- txtcolor - Text font color (in dex format, without #)
- w - Canvas width
- h - Canvas height
- bgcolor - Canvas background color (in dex format, without #)

Example of request:
```
GET http://localhost/?txt=test&txtsize=20&txtcolor=57b0ff&w=200&h=200&bgcolor=79553d
```

Attention!
If you are using docker-machine, after the first run you need to find the location of the mounted directory
```/php-fpm/app/public/storage```
in the host file system and change the permissions to the directory.
example:
```chown www-data:www-data -R ~/docker/php-fpm/app/public/storage```
You can find the directory using the command:
```find / -type d -name 'app'```

Example of a deployed service:
```
http://placeholder.cf/?txt=test&txtsize=20&txtcolor=57b0ff&w=200&h=200&bgcolor=79553d
```