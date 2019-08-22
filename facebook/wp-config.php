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
define('DB_NAME', 'thammyvn_face');

/** MySQL database username */
define('DB_USER', 'thammyvn_face');

/** MySQL database password */
define('DB_PASSWORD', 'mgk2018');

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
define('AUTH_KEY',         '%aABErL.^vYbJ9Ie!0sW(T-$X7|l+[oYO3{b4n_bbV}%j65/A;E;&qWOh!G/,9.W');
define('SECURE_AUTH_KEY',  'qi_pp4#=DaaeT8+Y`O[B@:X>2`f]W?*eI2x1B?H5}olx!Ylb3|%c$kSD:VU 8qwN');
define('LOGGED_IN_KEY',    'NOZ:L%?~<C7yl.]]S#V;))br+6npK>3#dWIl)uUK&pIEQ>;7@/{3xqi%,kWNU;N^');
define('NONCE_KEY',        '7I9s*xLogR:BnHa $+!gE_Rv9S/^C#U7p07AUINT|W*{{Vqd(5c$xbU3piO(e{kY');
define('AUTH_SALT',        'S0[*Euo$Ch@S*Q9m^/r+n76EAC4Fyycgf[^^vbQ$^}qUp*ajwP0-F-J1jK)VG9d ');
define('SECURE_AUTH_SALT', 'P%0tSL *A&<I],$AK]8~AsN(bXQU {!C%-SadEt~9@]`1#5>^N+.vStI:[<0<::M');
define('LOGGED_IN_SALT',   '!7ugun-};tO-oI~.^T>/8Ssz]B3HG,Sam^=lj|L~lE>j#Ebe@FZ&edOk}qAiDQ[H');
define('NONCE_SALT',       '@A!8A)IJ#+{*+&Us9*5%qr?S81+7OZXQoc~ d7!2p.Z!mIAF~~u`9VeF}Aw%y&GB');

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
