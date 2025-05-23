FROM debian:bullseye

ENV DEBIAN_FRONTEND=noninteractive

# Instalar MariaDB
RUN apt-get update && apt-get install -y mariadb-server && apt-get clean

# Crear directorios necesarios
RUN mkdir -p /etc/mysql /var/lib/mysql /run/mysqld && chown -R mysql:mysql /var/lib/mysql /run/mysqld

# Copiar archivos de inicialización
COPY conf/init.sql /etc/mysql/init.sql
COPY tools/init.sh /init.sh

# Permisos de ejecución
RUN chmod +x /init.sh

# Exponer el puerto estándar de MariaDB
EXPOSE 3306

# Comando de inicio
CMD ["/init.sh"]