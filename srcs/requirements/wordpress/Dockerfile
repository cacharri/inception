FROM debian:bullseye

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    php php-fpm php-mysql curl unzip wget less mariadb-client \
    && apt-get clean

RUN mkdir -p /var/www/html && chown -R www-data:www-data /var/www/html

# Instalar WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && mv wp-cli.phar /usr/local/bin/wp

# Copiar archivo de configuración y script de setup
COPY conf/wp-config.php /var/www/html/wp-config.php
COPY tools/wp-setup.sh /usr/local/bin/wp-setup.sh

RUN chmod +x /usr/local/bin/wp-setup.sh && chown www-data:www-data /usr/local/bin/wp-setup.sh

# Configurar PHP-FPM
RUN sed -i 's|listen = .*|listen = 9000|' /etc/php/*/fpm/pool.d/www.conf

CMD ["wp-setup.sh"]
