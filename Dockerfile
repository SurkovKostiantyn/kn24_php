# Використовуємо офіційний PHP-образ
FROM php:8.2-apache

# Копіюємо файли в контейнер
COPY . /var/www/html/

# Встановлюємо права доступу
RUN chown -R www-data:www-data /var/www/html

# Відкриваємо порт 80
EXPOSE 80
