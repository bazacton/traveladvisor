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
define('DB_NAME', 'u312518386_traveladvisor');

/** MySQL database username */
define('DB_USER', 'u312518386_traveladvisor');

/** MySQL database password */
define('DB_PASSWORD', 'Ah2o@[dDzTG=');

/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uJLA4&oZWC8 VqW0MOY*r4rlM!+~;I)gc>oXb[~.T6ingXPww B;$w|:Qy-z!Z*0');
define('SECURE_AUTH_KEY',  'Och,RNKf+XY|cWxKLDhn/7qO$< ) (K3YKSEB2a8b@8]@/`-UjiE?mXYc7obtt2D');
define('LOGGED_IN_KEY',    'jI8kphF4kV2R88Ev:or@LTYMzS 20_}p1[$T]GtI`{MmoQK?nx?,JSF7+WCrCFN9');
define('NONCE_KEY',        'ZD^w@IYFwK<)N?x-0X<[F&UIv:nqgSM*qtgv][!V7<v%[MKt<g|^tQ]iZOyQ<Fc2');
define('AUTH_SALT',        '</e0Mm1tgH&Dc$rO~jih~hO12ko^7cSsw$yhI[>dmP&QS!QfW.lUOlUUBJqA?xUi');
define('SECURE_AUTH_SALT', 'Eml4;r~>.2;aEFA8pfC.QP0{FuP8U;+faQ:Twv=(%Oa>yVxFYv)wIyY0cBcLa&ok');
define('LOGGED_IN_SALT',   '?U<tzH#A7aruWS0+LjB=*Y(yP{&Pf@*Nz5!%-Y[+Y!G5bdu<:55X5UR_)p/(Bjyo');
define('NONCE_SALT',       'ef<.tc&1r]9,|I4va^r)KGZgg/V|3eOB`(sS-b5R<nFWsr+}V##x$W7lBeA{n31.');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'traveladvisor_';

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
