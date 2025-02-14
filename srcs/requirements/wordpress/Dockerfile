FROM wordpress:php7.4-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y default-mysql-client procps psmisc curl \
    && docker-php-ext-install mysqli \
    && rm -rf /var/lib/apt/lists/*

# Configurar PHP-FPM para escuchar en IPv4
RUN sed -i 's/listen = .*/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Asegurar permisos de WordPress
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instalar wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Copiar el archivo de configuración de WordPress
COPY conf/wp-config.php /var/www/html/wp-config.php

# Ejecutar PHP-FPM en primer plano
CMD ["php-fpm", "-F"]
