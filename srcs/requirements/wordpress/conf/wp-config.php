<?php
// Configuración de la base de datos
define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'wp_user' );
define( 'DB_PASSWORD', 'wp_password' );
define( 'DB_HOST', 'mariadb' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// Claves de autenticación (puedes generarlas en: https://api.wordpress.org/secret-key/1.1/salt/)
define( 'AUTH_KEY',         'pon-aqui-tu-clave' );
define( 'SECURE_AUTH_KEY',  'pon-aqui-tu-clave' );
define( 'LOGGED_IN_KEY',    'pon-aqui-tu-clave' );
define( 'NONCE_KEY',        'pon-aqui-tu-clave' );
define( 'AUTH_SALT',        'pon-aqui-tu-clave' );
define( 'SECURE_AUTH_SALT', 'pon-aqui-tu-clave' );
define( 'LOGGED_IN_SALT',   'pon-aqui-tu-clave' );
define( 'NONCE_SALT',       'pon-aqui-tu-clave' );

// Prefijo de las tablas de la base de datos
$table_prefix = 'wp_';

// Habilitar debug solo en desarrollo
define( 'WP_DEBUG', false );

// Configuración de la URL del sitio (ajústalo si es necesario)
define( 'WP_SITEURL', 'https://localhost:433' );
define( 'WP_HOME', 'https://localhost:433' );

// Configuración de archivos directos (evita problemas con FTP en Docker)
define( 'FS_METHOD', 'direct' );

// Evitar ediciones en el panel de administración
define( 'DISALLOW_FILE_EDIT', true );

// Configuración final de WordPress
if ( !defined('ABSPATH') ) {
    define('ABSPATH', dirname(__FILE__) . '/');
}
require_once ABSPATH . 'wp-settings.php';
