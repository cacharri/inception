FROM wordpress:php7.4-fpm

# Instalar extensiones necesarias (opcional)
RUN apt-get update && apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli
RUN sed -i 's/listen = .*/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

CMD ["php-fpm"]
