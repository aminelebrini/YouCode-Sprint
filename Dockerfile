FROM php:8.2-apache

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY src/ /var/www/html/

RUN mkdir -p /var/www/html/src/cache \ && chown -R www-data:www-data /var/www/html \ && chmod -R 755 /var/www/html

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/src/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80