FROM debian:bullseye

# Instalar MariaDB
RUN apt-get update && apt-get install -y mariadb-server

# Crear directorios necesarios y asignar permisos
RUN mkdir -p /run/mysqld && \
    chown -R mysql:mysql /var/lib/mysql /run/mysqld

# Inicializar la base de datos de MariaDB
RUN mysql_install_db --user=mysql --ldata=/var/lib/mysql

# Copiar archivo de configuración
COPY ./conf/my.cnf /etc/mysql/my.cnf

# Especificar el usuario y exponer el puerto
USER mysql
EXPOSE 3306

# Comando para iniciar MariaDB
CMD ["mysqld"]
