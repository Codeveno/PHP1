#use officlal PHP Apache image
FROM php:8.1-apache
#enable apache mod_rewrite if needed
RUN a2enmod rewrite
#copy project files into apache document root
COPY . /var/www/html/

#set proper permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html
