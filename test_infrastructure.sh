#!/bin/bash

echo "Verificando contenedores..."
docker ps

echo "Esperando que los servicios estén listos..."
sleep 10

echo "Probar conexión a MariaDB desde WordPress..."
docker exec srcs_wordpress_1 mysql -h mariadb -u "${MYSQL_USER}" -p"${MYSQL_PASSWORD}" -e "SHOW DATABASES;"

echo "Probar conexión de Nginx a WordPress..."
docker exec srcs_nginx_1 curl -I http://wordpress:9000
