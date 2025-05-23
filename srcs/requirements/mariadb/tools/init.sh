#!/bin/sh

# Reemplazar variables en el SQL con valores reales de entorno
sed -i "s/\$MYSQL_DATABASE/$MYSQL_DATABASE/" /etc/mysql/init.sql
sed -i "s/\$MYSQL_USER/$MYSQL_USER/" /etc/mysql/init.sql
sed -i "s/\$MYSQL_PASSWORD/$MYSQL_PASSWORD/" /etc/mysql/init.sql
sed -i "s/\$MYSQL_ROOT_PASSWORD/$MYSQL_ROOT_PASSWORD/" /etc/mysql/init.sql

# Lanzar MariaDB con el script de inicialización
exec mysqld --user=mysql --init-file=/etc/mysql/init.sql