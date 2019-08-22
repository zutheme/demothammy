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

define( 'DB_NAME', 'tmvtkvn_cuocthi' );



/** MySQL database username */

define( 'DB_USER', 'tmvtkvn_cuocthi' );



/** MySQL database password */

define( 'DB_PASSWORD', 'mgkgroup2018' );



/** MySQL hostname */

define( 'DB_HOST', 'localhost' );



/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );



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

define( 'AUTH_KEY',         ' XBxr(<|hXZO m_=q:.W$f8I6y30tDZ8R%-]@,2~I?o><|W:adt2>6ei4M>GunB,' );

define( 'SECURE_AUTH_KEY',  'A4V8zM%xfKa+~Q?vpn}zsBiw9m:jh8//>P9LY,1)%r=MFqW=_FPMr83m#B+jCb53' );

define( 'LOGGED_IN_KEY',    '5j_hY7p$(sD)7fHLyPH- ll9}; X@cxN$sR#IVN(:O}U4]L}PR1J}5&b~0B}G`Y^' );

define( 'NONCE_KEY',        'OC ?UXhuLRH7~.s[w1nfT^qzdB52}WLat+6|x.K~5e:_yL8(>!8?hW#!|&e5%/,^' );

define( 'AUTH_SALT',        '>4$/x3~z9.#/_KQ;p3vr!:.dqQvL_+|}C@=Ag@&LHLJwSJ9nk;i-}{|2PWM_@r3j' );

define( 'SECURE_AUTH_SALT', ';>(#u9B5}FI(K7LO(Lli9qYca%^i>J7|ble*1t=`5FM^GY,d4gXWSgN@8a]Xi_:c' );

define( 'LOGGED_IN_SALT',   'u+Ohz:bWq#>h:3`9rWTUDIY.a*4Mi7=5xv U;3/thM[$DJdm_N5#N#FQYsrxhF]p' );

define( 'NONCE_SALT',       'SITr*Z37P6+q)Ru2QJtLDFAzx]O=zfbVV)pWtlPhUf00yb3m?6.xIf8G*z:?=-gn' );



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

 * visit the Codex.

 *

 * @link https://codex.wordpress.org/Debugging_in_WordPress

 */

define( 'WP_DEBUG', false );



/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

}



/** Sets up WordPress vars and included files. */

require_once( ABSPATH . 'wp-settings.php' );

