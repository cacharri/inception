# Inception

## **Descripción del Proyecto**
El proyecto **Inception** consiste en diseñar y configurar una infraestructura utilizando **Docker** y **Docker Compose** para desplegar varios servicios interconectados en un entorno virtualizado. Este proyecto pone en práctica habilidades relacionadas con la administración de sistemas, la creación de contenedores personalizados y el manejo de redes virtuales.

---

## **Objetivo Principal**
Desplegar una infraestructura compuesta por los siguientes servicios en contenedores Docker:

1. **MariaDB**:
   - Una base de datos que almacene los datos de un sitio web WordPress.
2. **WordPress**:
   - Un gestor de contenidos instalado y configurado.
3. **Nginx**:
   - Un servidor web que actúe como puerta de entrada a la infraestructura, con soporte para TLS.

---

## **Requisitos del Proyecto**

### **1. General**
- Todo debe implementarse en una máquina virtual (VM).
- Utilizar **Docker Compose** para la orquestación.
- Escribir un **Makefile** que construya y configure toda la infraestructura.
- Usar imágenes Docker personalizadas creadas con **Dockerfiles**.
- Restringir los protocolos TLS a **v1.2** o **v1.3**.

### **2. Contenedores**
- Cada servicio debe ejecutarse en un contenedor independiente.
- Se deben utilizar como base las versiones estables penúltimas de **Alpine** o **Debian**.
- Los datos de los servicios deben ser persistentes utilizando volúmenes Docker.
- Cada contenedor debe reiniciarse automáticamente en caso de falla.

### **3. Red**
- Crear una red virtual personalizada para la comunicación entre contenedores.
- **Prohibido:** `network: host`, `--link` o `links`.

---

## **Estructura del Proyecto**

### **Archivos principales**
- **Makefile**: Automación de la construcción y configuración.
- **docker-compose.yml**: Orquestación de los servicios Docker.
- **.env**: Variables de entorno sensibles, como contraseñas y configuraciones.
- **srcs/**: Carpeta que contiene:
  - **requirements/**: Subcarpetas para cada servicio con sus Dockerfiles y configuraciones.
    - **nginx/**: Configuración de Nginx.
    - **mariadb/**: Configuración de MariaDB.
    - **wordpress/**: Configuración de WordPress.

Ejemplo de estructura del directorio:
```
.
|-- Makefile
|-- docker-compose.yml
|-- .env
|-- srcs
    |-- requirements
        |-- mariadb
        |   |-- Dockerfile
        |   |-- conf
        |       |-- my.cnf
        |
        |-- nginx
        |   |-- Dockerfile
        |   |-- conf
        |
        |-- wordpress
            |-- Dockerfile
            |-- conf
```

---

## **Pasos de Configuración**

1. **Preparar la Máquina Virtual:**
   - Instalar **Debian** como sistema base.
   - Configurar Docker y Docker Compose.

2. **Configurar cada Servicio:**
   - Escribir Dockerfiles personalizados para cada servicio.
   - Definir configuraciones específicas (e.g., certificados SSL para Nginx).

3. **Configurar el Archivo `.env`:**
   - Establecer variables de entorno como contraseñas y nombres de bases de datos.

4. **Crear el Archivo `docker-compose.yml`:**
   - Definir los servicios, volúmenes y red.

5. **Escribir el Makefile:**
   - Automatizar la construcción y despliegue con comandos como `make up` y `make down`.

6. **Probar y Depurar:**
   - Verificar la conectividad entre servicios.
   - Comprobar la persistencia de datos y la configuración de TLS.

---

## **Comandos Útiles**

### **Levantar la infraestructura:**
```bash
make up
```

### **Detener y limpiar la infraestructura:**
```bash
make down
```

### **Reconstruir los servicios:**
```bash
make rebuild
```

---

## **Notas Importantes**

- Utiliza la penúltima versión estable de Debian o Alpine para los contenedores.
- Todos los datos sensibles deben almacenarse en el archivo `.env` y este no debe subirse al repositorio.
- Asegúrate de que los volúmenes están correctamente configurados para la persistencia de datos.
- No utilices configuraciones obsoletas en el archivo `docker-compose.yml`.

---

## **Referencias**
- [Documentación oficial de Docker](https://docs.docker.com/)
- [Documentación de MariaDB](https://mariadb.com/kb/en/)
- [Documentación de WordPress](https://wordpress.org/support/)
- [Documentación de Nginx](https://nginx.org/en/docs/)

