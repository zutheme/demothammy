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
define('DB_NAME', 'thammyvn_voucher');

/** MySQL database username */
define('DB_USER', 'thammyvn_voucher');

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
define('AUTH_KEY',         'Ct|n-eHGUkP@O?mL{,uvm}_icNG&(tqGa%sq]LW*28-+l.jmR2Gr0*LXu,%a jkZ');
define('SECURE_AUTH_KEY',  'er@m%U:~SnCPgN}C_[YB8E0u%FBY[H.h80&MwC*Zw(N:h-!FMc66VbWlBm^uL0I%');
define('LOGGED_IN_KEY',    ' j7%?aIm*yu9`IRcgJb9H0iV#Q|RY=/&te^pRjw_r1RnbJ=iS4ym@w4vy54^5ag]');
define('NONCE_KEY',        '.Q(F-aAlf2a Z7ul5cc5IQh;P?m>6Q|sVM6-6Wvi0U< 5?o]_@Jl4zr&@3_no/,W');
define('AUTH_SALT',        '_0|fpE?Ik=bb8$_4[Z9;I`ds?;8G8A)PVO4dPyAT.K1r xqS+ wQ*Z.s+c:XD5GK');
define('SECURE_AUTH_SALT', '=2#=AeLIn_g+.wNYVL:<7k7E$]zC,v8Ty3;FW$UbpZa07a{Z$  tmFn>+Hm>XFzN');
define('LOGGED_IN_SALT',   '*)-r2?WLQM^SqdjC0,g~7|3WL~vwgd,f0r+2PZ%Yf%`x-q!IMi$B^h/N48!G$^V=');
define('NONCE_SALT',       ':j3_J8X,{$2n+c6^z9D:[obR9crVPg^tC*{XBuQB9e5Zx>_ &)yo@_MuBzH0OC> ');

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
