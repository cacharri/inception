FROM mariadb:10.5

# Establecer las variables de entorno para la base de datos
ENV MYSQL_ROOT_PASSWORD=${MYSQL_ROOT_PASSWORD}
ENV MYSQL_DATABASE=${MYSQL_DATABASE}
ENV MYSQL_USER=${MYSQL_USER}
ENV MYSQL_PASSWORD=${MYSQL_PASSWORD}

# Copiar configuración adicional (si es necesaria)
# COPY conf/my.cnf /etc/mysql/my.cnf

CMD ["mysqld"]
