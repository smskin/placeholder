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

Examples:
```
GET http://localhost/?txt=test&txtsize=20&txtcolor=57b0ff&w=200&h=200&bgcolor=79553d
```