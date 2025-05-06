FROM php:7.4-apache
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli

EXPOSE 80
COPY . /var/www/html
ENTRYPOINT [ "/usr/sbin/apache2ctl", "-D", "FOREGROUND" ]