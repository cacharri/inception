FROM wordpress:php7.4-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y default-mysql-client procps psmisc \
    && docker-php-ext-install mysqli \
    && rm -rf /var/lib/apt/lists/*

# Configurar PHP-FPM para escuchar en IPv4
RUN sed -i 's/listen = .*/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Asegurar permisos de WordPress
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Descargar WordPress solo si no está presente
RUN [ ! -f /var/www/html/wp-config.php ] && wp core download --allow-root || true

# Ejecutar PHP-FPM en primer plano para que el contenedor no se cierre
CMD ["php-fpm", "-F"]
