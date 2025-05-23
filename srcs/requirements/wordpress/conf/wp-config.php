<?php
// Configuración de la base de datos
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') );
define( 'DB_USER', getenv('WORDPRESS_DB_USER') );
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// Claves de autenticación (reemplaza con claves reales en producción)
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

// URL del sitio
define( 'WP_SITEURL', 'https://' . getenv('DOMAIN_NAME') );
define( 'WP_HOME', 'https://' . getenv('DOMAIN_NAME') );

// Configuración de archivos directos (evita problemas con FTP en Docker)
define( 'FS_METHOD', 'direct' );

// Evitar ediciones en el panel de administración
define( 'DISALLOW_FILE_EDIT', true );

// Configuración final de WordPress
if ( !defined('ABSPATH') ) {
    define('ABSPATH', dirname(__FILE__) . '/');
}
require_once ABSPATH . 'wp-settings.php';