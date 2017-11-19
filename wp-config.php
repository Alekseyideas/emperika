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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
//log: admin
//pass: eDYTiedrVyW6
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'emperika');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'd>1 -[ %>)t29&:,sYB$(]~h5QPc@Y95NzA8bC:]PN;=aLrh{2bf.O2We]^V:qw5');
define('SECURE_AUTH_KEY',  '@]Pv@D 96P;1=Gy4w0UW!yFVEfc&wC@ULpWP~.@PZso/}YSdV)}@19EcyUwKI!{<');
define('LOGGED_IN_KEY',    'Js$,t1^m[de^_Z$SyWAAIYt6|@I$}z~g|5rf-UW7De<7Zz,lil=8KOB,&Sf:j8qG');
define('NONCE_KEY',        '0kw>MYs~[lEla(!U-Xk,(:3t-lK#G;_A:}vyl{FK9`h)}l-vIV9z8SUCSzbA?Mbz');
define('AUTH_SALT',        '!EHg*xbSK$zN*h%z:nT1<J$32ixPj*{G1i:I/,6lzFEklVOjmZB`y}me!:O*;t;2');
define('SECURE_AUTH_SALT', 'C7CkX2pmKJnzBQsXv`(f~|B51s0&)UC.Qh~%JzI>0Ke8 q-M&<B7~W+Ux4P$,$/9');
define('LOGGED_IN_SALT',   'K{XM&pGG+|ElXE<2K-qC3iXy-R?-+Eba[_Q%_%J>zTh@|)JnZ(+gt4I%9A6 <eXb');
define('NONCE_SALT',       'T XO8>Ot>$e Q9a}Dr,7 *m!YITqucYkg51<2,@E>LMqsqrC`|XdT>$w/02Q#QZq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


/*$DISABLE_UPDATE = array( 'advanced-custom-fields-pro');*/
