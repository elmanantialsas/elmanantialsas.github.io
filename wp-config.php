<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'funmanantial_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'sanyesid' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'o|O9L0iBa3qHtudzsZ r;${1TU>@8!yGOOSHjFGHZs)X K`Y2fi> B [!:y+*?Z<' );
define( 'SECURE_AUTH_KEY',  '0z3`)*+TDwS]$rGFqk^|n|W~r2J,7rAW[6Hs>_-YG`{eqe[?s9y5pYfUU$$<Vn.]' );
define( 'LOGGED_IN_KEY',    '?!6+/$2ppwRE/,de%[!1aE.uJ/0Z1_$J;Pn>Y=0EDuGxww)oFOqm3p1}=p*syu^W' );
define( 'NONCE_KEY',        'sBI,sH8i+EDhHFDR@X>U(|WeE$AV^Y,86>XSm.=6IYPKI}oUzMxohq~k;lzJGg%]' );
define( 'AUTH_SALT',        '0|@B6q=Vn.G9!D$2f;a5,~pVQBU?bP=GLG;h?K.~mi3&Rtra-o!6EyW_[4.eTEt#' );
define( 'SECURE_AUTH_SALT', 'mnXfu3k&/SU|0@qNB6eNzySW$z}:|okG2e+E.^hM?0wzeSe?+Or:ki+d^8WWMA1k' );
define( 'LOGGED_IN_SALT',   '1tqtK|m1LaLLl4hxx^H!IY5%jeq#Z}O 8V+e?muG2T5g9BG|)%M1@L%}y>8}qoC#' );
define( 'NONCE_SALT',       'a>M4Re[>i_nIXoGJeoI7|o2c8O=Ra*Jq.K3>l.^IrG0_HgDSe=+n2TsTjJfw*}Hx' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
