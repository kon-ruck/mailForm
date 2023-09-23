FROM php:8.0.3-apache

COPY ./form/ /var/www/html/
RUN mkdir /var/www/html/PHPMailer
COPY ./PHPMailer /var/www/html/PHPMailer
RUN chmod 640 /var/www/html/config/config.php
RUN chown www-data:www-data /var/www/html/config/config.php