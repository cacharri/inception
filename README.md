# Inception - 42 Project

## ✨ Description

This project is part of the 42 curriculum and aims to introduce students to **system administration and containerization** using **Docker** and **Docker Compose**. The goal is to create a secure and functional WordPress website running inside multiple Docker containers, fully isolated, and communicating through a custom Docker network.

## 📅 Project Objectives

* Understand the basics of Docker and containerization.
* Set up isolated services for a typical web application.
* Configure secure communication using HTTPS.
* Follow strict technical constraints and best practices.

---

## ⚙️ Services and Architecture

The infrastructure is composed of:

* **NGINX**: Acts as the sole entry point. Secured with TLSv1.2/1.3 and only serves on port 443.
* **WordPress**: Configured with PHP-FPM (no NGINX inside), built from `debian`.
* **MariaDB**: MySQL-compatible database. Built from `debian` and initialized with SQL script.
* **Volumes**:

  * One for WordPress files (`/var/www/html`).
  * One for the MariaDB data (`/var/lib/mysql`).
* **Docker network**: Custom bridge network `inception_network`.

---

## 📂 File Structure

```
.
├── Makefile
├── srcs/
│   ├── .env
│   ├── docker-compose.yml
│   └── requirements/
│       ├── nginx/
│       │   ├── Dockerfile
│       │   └── conf/nginx.conf
│       ├── wordpress/
│       │   ├── Dockerfile
│       │   ├── tools/wp-setup.sh
│       │   └── conf/wp-config.php
│       ├── mariadb/
│       │   ├── Dockerfile
│       │   ├── conf/init.sql
│       │   └── tools/init.sh
```

---

## 🎓 Technical Explanation per File

### Makefile

Automates the deployment and lifecycle of the containers. Targets include:

* `build`: builds Docker images.
* `up`: starts the infrastructure.
* `down`, `clean`, `fclean`, `re`: clean/restart infrastructure.

### .env

Stores environment variables (e.g., database credentials, domain name) safely. Used via `${VAR}` in Docker Compose and config files.

### docker-compose.yml

Defines the services (`nginx`, `wordpress`, `mariadb`), their dependencies, volumes, and custom network.

### nginx/

* **Dockerfile**: Built from `debian`, installs `nginx` and generates self-signed SSL cert.
* **nginx.conf**:

  * Listens only on port 443 with SSL.
  * Redirects HTTP to HTTPS.
  * Forwards PHP requests to WordPress container.
  * Includes security headers.

### wordpress/

* **Dockerfile**: Installs `php`, `php-fpm`, `wp-cli`, and WordPress manually from source.
* **wp-setup.sh**: Uses `wp-cli` to install and configure WordPress with a non-admin user.
* **wp-config.php**: Configuration file using `getenv()` to read env variables securely.

### mariadb/

* **Dockerfile**: Installs MariaDB server manually.
* **init.sql**: SQL script that creates database and user with privileges.
* **init.sh**: Replaces placeholders in `init.sql` with env values and starts `mysqld` with the script.

---

## ✅ Mandatory Requirements Checklist

* [x] Custom Dockerfiles (no images except Alpine/Debian).
* [x] Each service runs in its own container.
* [x] TLSv1.2/1.3 enforced on NGINX.
* [x] Domain points to local IP (`login.42.fr`).
* [x] Two volumes (WordPress + DB).
* [x] Auto-restart policies.
* [x] No `tail -f` or infinite loop hacks.
* [x] Admin user in WordPress does NOT contain 'admin'.
* [x] `.env` used for secrets and config.
* [x] Only port 443 is exposed externally.

---

## 🚀 How to Run

1. Add this line to your `/etc/hosts`:

   ```
   127.0.0.1 your_login.42.fr
   ```
2. Build and start:

   ```bash
   make up
   ```
3. Visit: `https://your_login.42.fr`

---

## 📖 References

* [Docker Docs](https://docs.docker.com/)
* [NGINX SSL config](https://nginx.org/en/docs/http/configuring_https_servers.html)
* [WordPress CLI](https://developer.wordpress.org/cli/commands/)
* \[42 Inception Subject PDF]

---

Feel free to use and adapt this architecture for real-world projects. It's a great foundation for secure containerized applications.
