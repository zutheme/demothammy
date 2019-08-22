<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'demothammy_db');
/** MySQL database username */
define('DB_USER', 'demothammy_u');
/** MySQL database password */
define('DB_PASSWORD', 'demothammy');
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
define('AUTH_KEY',         'S~dWuA{/%{vj9Dxlm+6Jt!^xTfN+]qgObHavuV8h+]zCS]ujTx|Tu6OEyu%~owmS');
define('SECURE_AUTH_KEY',  'z r>hk%-Ooy?q9P%K4=0_hDXx72f+x~0V1lM*Ifgi z3O>fESYBq$7Vf&zE,3.j?');
define('LOGGED_IN_KEY',    'o`)E@CW,.Zz?~U_6Aj=`poPdZ(7!J#y(M<n}DM4pz-xnhDUG#7Fj-mwp;.&}HQu#');
define('NONCE_KEY',        'Pu7k]mh%woZJUHyO;~&]bT-vBMPY/:NofHyz]].ic]1,Io/~&C/{Ch/1UQ),]D7k');
define('AUTH_SALT',        '9bz{uAWzW,Ap^7Km51[&[}K2@6s&<o(O@z1AI v5Q>Vc0mD3y pUwFuFjmyO5~?.');
define('SECURE_AUTH_SALT', '}Wqg6fhJN@Ci)cr}Dkqe3G7l1cis6OgyA1B=aO`o<kutH{i(J117g7`H?bHw9}6T');
define('LOGGED_IN_SALT',   '~?tPY@5E7K7l[7{ XDU]mET<[`{ul$W=4Fip:Oy+/k8:?DTF ;QbrD&r4eSWdtDv');
define('NONCE_SALT',       'p8>zC$RGNe6G5=)h,}!F~_OFz:*_SoMT|yYhe`^/hd5X4W/U*aF8KHHI2xf/{5#L');
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
