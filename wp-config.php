<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'platzigift' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|J N|##9<m9lwWk&+HF_n/0u,zs-+T3n,y_G59frrgVq}:S1yd{;;F]2GDi/}-nY');
define('SECURE_AUTH_KEY',  'cJ$ }4468ZuX3|Z$[&}l7GY:=]j#vJDkX<S7q(UI KShTYCxz6J@/?^qxi;,k0}W');
define('LOGGED_IN_KEY',    '`koZKHKC6MZ{*ZJ0c*9nPJ$Q;.Y/G>%qdck~hKbd 3)<l+!IPr;rTK0++Z21Ncrj');
define('NONCE_KEY',        '`-?x9%={Gi}h.]pS!.ILjRg^FJ&r!V?OC$KibBP|-g$^?+HO6a2-;h}H3liiN6Ze');
define('AUTH_SALT',        '0@7lgTvkRMys*G`a>>Z5<)gD1wl.vt,(T>W&D}tY +fMm+-N)$!?sLRJH-]QdsXj');
define('SECURE_AUTH_SALT', '1p;?k(~o,T:I4pm0Y@#B^V^9-Wr|`>+[c;&-%`U&FL(N#E3 4H;PY@NW!.`LOW]?');
define('LOGGED_IN_SALT',   'c!!Rn(.N>xW]:|tZxBAsv{+I+ym1(AW%]%{kOeX +FLl8#wemM-=w-TdV}5k.R1<');
define('NONCE_SALT',       'w7=xW`2vV|x]?*K[U*g6k.?8jG-R:>y{qo#O3%n4`xviCkv_UYQ4Y*+GVm>RB#.;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
