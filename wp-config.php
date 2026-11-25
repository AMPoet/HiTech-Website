<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
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
define( 'AUTH_KEY',         ',eQ_f/x==JX;al_1{!hhYU((NLi.H9>CE[cQjm#:jj aN?x`aZ%%<)?k|BN17if!' );
define( 'SECURE_AUTH_KEY',  'udg%2g*Olgw2hNj#> ,~3IgDJ$7<VDH[nhqkM[pNdNI3M>~uuaCwCAuE,AIrtqWa' );
define( 'LOGGED_IN_KEY',    'K8?s?Z@VFm~J,}6]u.>)Y%Ygymo6&qU31#ocl-ub;vF-lMhC6avpPR9t([p)T?AQ' );
define( 'NONCE_KEY',        't0@}.?GohrJe;js=0eX8$__Vom?CT^1K*xz|il&J$(o6p})>3V.G`~Bdf0=U.n$?' );
define( 'AUTH_SALT',        '>pyy@zyola{mP#wT5eFUEw]}f7N@6iK+_:t,Re1[yM$M@XFGN|r@sDv}SliVAVeK' );
define( 'SECURE_AUTH_SALT', ',/hy%q$TXTrIqj9S-Y_9EHzepYc/^t.obsJgdkYXvz&fN?,De!sKpul=l][]@3.H' );
define( 'LOGGED_IN_SALT',   '07VU15H}Ur&?TO&Pi,2(j(HfwvscQEh`ps?y<7E<q(fg)RAJmv~K0zh4r;y~Pkg:' );
define( 'NONCE_SALT',       'Cii0+OW!r1:87ba5Ksi 5yo)%D;8!-[sv.G%EktC9Rn)^i&~eexA6O@c,_O`cK?%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
