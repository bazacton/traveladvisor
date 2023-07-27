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
define('DB_NAME', 'u312518386_travel_bonjour');

/** MySQL database username */
define('DB_USER', 'u312518386_travel_bonjour');

/** MySQL database password */
define('DB_PASSWORD', 'Ah2o@[dDzTG=');

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
define('AUTH_KEY',         'RAY@fjM/L3|0:pRl`e}tN;Xd5{ZzD*Cx9TDgmciSOv87VWG:?6lAAsFFrVzvIxZA');
define('SECURE_AUTH_KEY',  'fvHSDd^-rPdqpMK]IBHx;}L@7|xMFR`b,,~X?+UwWc){U)+.XZ.GEp$g~-1&e]ZQ');
define('LOGGED_IN_KEY',    '4V*9dqu]%H.&0RD?EbG~ibJd-)wFzVY8qT&0X!|*1(gwR#-2Z70}`f@jLDD4/`og');
define('NONCE_KEY',        'P`L6v{@F)yf);D%gPR]FYYH+K/#ufi*BnF6ZR@V5htr)L:@Gaw ej^08_-5kw;xX');
define('AUTH_SALT',        'V^$]LCl@G~8a8mpj#Cx0TXEI;jGc@Y?w{hP4R;A(vjW*J-POYm %{2y)fmAE1nMF');
define('SECURE_AUTH_SALT', '[aHV(`j_c6oB$Ul_%sL0_-SYhquz37Gu]Zz>A8ab}cIh>9tA?6A+9Ru_.Ooo_4-O');
define('LOGGED_IN_SALT',   ')s8_/gpZ`hPoop7&g||r)FC>d41Vb~:AW,:v$p,=^cys.ylt;r|M8.xzpmz]^lnd');
define('NONCE_SALT',       'd i/mO1h)!pw78(&#irlmsXA@fE+LR(g=wghu5,FhUr{1f4-;)}CDr%AZ*,;}g^G');

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
