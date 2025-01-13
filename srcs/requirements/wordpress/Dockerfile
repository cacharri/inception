FROM wordpress:php7.4-fpm

# Instalar extensiones necesarias (opcional)
RUN apt-get update && apt-get install -y default-mysql-client
RUN docker-php-ext-install mysqli

CMD ["php-fpm"]
