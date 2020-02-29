<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'alorawp');

/** MySQL database username */
define('DB_USER', 'alorawp');

/** MySQL database password */
define('DB_PASSWORD', 'kangaroopoop');

/** MySQL hostname */
define('DB_HOST', 'westeros.ca23bmaxk8hk.us-west-2.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[hB2-Xi#^]kT<IgtBHomqq>BfwW-aeFx}|&S$S;j35LgEX{1?@#+Z,Ls^;~p|+36');
define('SECURE_AUTH_KEY',  'dHRJ)(-x{m/3vIm1+-8o@`f+1]m#nCD2wh3@-{cZu8xVWuJyJ{J:L_~+|o!Y`md6');
define('LOGGED_IN_KEY',    'G[9<M/[RF015Yn,Hf5iCyv E~e=-Hs~3wirgUve@1O9$HP!gGKuCKEhS.7ruB(ZB');
define('NONCE_KEY',        '.?&ic5 LzM;=renMKk(CS+-j|+0KY,`>Ix D*T[bF!dA*!LB? eyQ8}DedA- 5i8');
define('AUTH_SALT',        'H/X,:tp<tZ-!Tg&GVfj/ f2bk!ej_#G<gY+&I]D~7%|rxcK4~#PLpLu%,*XW&53`');
define('SECURE_AUTH_SALT', '/WsG-d[bOZ<>l:~/M!Xbt#LZhu1@Dz(h<zX`Y4tv|HlOmXcvs~ZL,]Aa*T%`y,*f');
define('LOGGED_IN_SALT',   '!X2F6ISDj+vxWS&$@L{zdW%.pL6]3%-eQ[:tfF0%HCgzJGX$oJY%NMmHglHaM=<]');
define('NONCE_SALT',       '+kafIhidg&`Oo~lwPptY:f!jkyztYcJ~ c_br3|4MQld{+pMTR{g#*K>+0cm6hR2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


