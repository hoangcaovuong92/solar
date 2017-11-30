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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fl_solar');

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
define('AUTH_KEY',         'q9fr5lwfkV0c9`J@$TKIkB#tK:7Z{$utUGOn;sQJ<mgu}qUBI=kEYUHn[qCl%(ji');
define('SECURE_AUTH_KEY',  '&eE+<P.u8fgX$qA;$R/z+[,^WFMr]aLd$XDZrKxu8ut^u%Rp0k5hzC~6!)Ht+nw2');
define('LOGGED_IN_KEY',    'SUd=?rIEQER%bfne<|BMos^~M.&5q@m=}hBdF;:lg3v;lnj9uHyfYAYCaA]F+6+(');
define('NONCE_KEY',        'j{%.t$aYfO.Kev;h}aSAib5->H!ofp~;)Z3SlYBDg9fy7@JbsfE}4_*Em}cxV?mU');
define('AUTH_SALT',        'Cz<<`CYPJDb,_#jDAq8a[6oy=a<cpQ}L~IgWFI5buD2gfn,K_S`kLj;$$,BWx--]');
define('SECURE_AUTH_SALT', 'sBW.REH6FIUK< S%1AgokDgq_VU]PvlQ$9=A_y<N;(.1{ogif%8YPl>P2E6/{$NI');
define('LOGGED_IN_SALT',   'jba0{4.31S_Ii^*pVShN@w6Wm4,!1rbfgWZ*ktSg&l-vz`%UmTx~T~Qf[zVlBPi^');
define('NONCE_SALT',       '?4NEX|w,xCE^?>OO7>[H*%olc{X2_$(vVcfg(Q[wYZ)=q5`f}x.,93(k3A2V#6qK');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

set_time_limit(180);
