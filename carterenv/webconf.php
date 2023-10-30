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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "khachhang_wp_carter" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "d@t@base" );

/** Database hostname */
define( 'DB_HOST', "localhost:3316" );

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
define( 'AUTH_KEY',         '>aIJ@`_e1Lo4zbK4K.V8z/39JV7p79!&tY/Ou9AvT2g(=;K]q,bi2C*]L!k~1_<g' );
define( 'SECURE_AUTH_KEY',  '{*6;;~EhUK@M!j-Pl.$bWwql?+ *%Fp~YH=<wTy`[z1R=M*mz}GaQw^C@U[N_-_d' );
define( 'LOGGED_IN_KEY',    'Vbk@,,vndeUPe[b(K=#OH:2}YWqA_;7^e).?>q >)Y~Hw0p9[~-sc<6&#Ib6p|C*' );
define( 'NONCE_KEY',        'pxH>uhvaGDm^!hbaC_~+ox_%S[Eu`v[$wS;pxp*z7s@IKzQ E<,kl5px/GodX|TZ' );
define( 'AUTH_SALT',        '+g{?Nbzk|[Mvyfkeq=n_enjuR}K7L!1m.dHn5!nhCf~MS!OA_:D(0`t~|U>5MY>X' );
define( 'SECURE_AUTH_SALT', '8{bx{m)EJlx>=N1p13K/<qEzJ44$:j6g.n]cyalk!WBa2}Gp#Y!Z+/?Lf<`L95(3' );
define( 'LOGGED_IN_SALT',   'b4vhTL#GO`)V#Hlt(qB{:JJr=2b9^D)EJ`w({>Zsj9&@6DO(,vJZZvX{W%imM;%V' );
define( 'NONCE_SALT',       '2.-fC:%C:}{Kz2O-.?CI3yH`0mNiegC nI1.%x4:DDy9703lUS~3 7oRuAYigKDI' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'DUPLICATOR_AUTH_KEY', '<!_<so]p(XdcW*8]fzJ2D`J>E9Sl&d-sMhhw1| j#AM5mpa~D%A63#Wp~3YLjZ]>' );
define( 'WP_PLUGIN_DIR', 'D:/xampp7/www/carter.local.com/wp-content/plugins' );
define( 'WPMU_PLUGIN_DIR', 'D:/xampp7/www/carter.local.com/wp-content/mu-plugins' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
