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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '#~fSYc7z-y6qz0a&<D[)|BiSF|{PQ@A._.fj{$*adRF(:SIw-xtO/8l{RYf%{Uv=' );
define( 'SECURE_AUTH_KEY',   'Vg/mMiJqp!8aEC)BHTD&}^gd(Z^h)Y@7kp: 5[$*#QiF`/}4~}=X.e|z>b2mlr/g' );
define( 'LOGGED_IN_KEY',     'Q}3]0ONTC|DP,{mY3Q:iuo?E~07C)9bK|WY<3)gIlkSOSU4|vrXVZjFfH_}wIO(f' );
define( 'NONCE_KEY',         '$2U_Y<eeQxjO_p}fr,tws4;R7MhSd=mNe`_4!IQc^0inss(>Gh4<I!,_[{F]_:GY' );
define( 'AUTH_SALT',         'Z&5npja>w67Cq2`B(lNtu*U`)|FcaVzcShu0tA?b/t%Pnu-x0KCO=CJl>qmuS{0y' );
define( 'SECURE_AUTH_SALT',  'R@3w<&a.F 3Z^>Ql51]jLO*YRrEJyI</m#iAXw4V5z|?3F{;xB#wd2>g**|D$/Yv' );
define( 'LOGGED_IN_SALT',    '7}*1?S5$fC!8~1AE;;E.zD.&zt<?p[pv+tSnjS(yo=q5Dh}ez ,`N{xLq$J#J2]h' );
define( 'NONCE_SALT',        '!yioJWnRmgV%OsspFFc-BFefp:qsO6cl[|wf]jgh&VvLX?1RaQgVLzwB^?J1xq:g' );
define( 'WP_CACHE_KEY_SALT', 'IGtjRGX9@=@jEnG_c<!W5:uNag5#T)EHDQDb:CmqjY^Jy3wJb*uN{x&wrZNjS/7L' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
