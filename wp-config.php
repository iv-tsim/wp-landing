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
define('DB_NAME', 'develop_udnet_db');

/** MySQL database username */
define('DB_USER', 'develop_udnet_db');

/** MySQL database password */
define('DB_PASSWORD', 'PnQQCIXz5yl0JBgV');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'heeVk9yA:78*?W<H 3]jUeG2eTh0+S]N#%{LvX@YsMXTQY hydWC9.<)(mI2c[B}');
define('SECURE_AUTH_KEY',  'mplqR ]RLQu#z0KNF<!Pg}&ku-2lP*p2;VAx|YW5G]*OW98|@R{Wn(/yJ5Gk&gS^');
define('LOGGED_IN_KEY',    'X(9cC|eO)F;1`rjFQW6|w;UbUu1H.e~sRt3$$%E(tCdj!B3mop-})GqA^g6>p,;/');
define('NONCE_KEY',        'a65NP%smy$>9TZuj*7d0SY*~3lOJFb>6N.6{a>REE:]Go?dd y/W`X|SIcnfXEcQ');
define('AUTH_SALT',        'T_s,X]MUtbl/UfOi8C[#r`9iudCj3N_UZwP<$2ZY{6| -MO8JY;ViU$v?R)XPxE:');
define('SECURE_AUTH_SALT', 'eR{j6A/bk^q2c=8lsBSI|=CU+Yrx3lry5 L6|+9^37)U4}8UWr,!|lya[Ib)`vj|');
define('LOGGED_IN_SALT',   '5pW_dIuzh~_iOEQ$-j|,qzD$Qg.d,$st1@;N2QHZcG&sA2+#cNX#7K(Imfn0A>;8');
define('NONCE_SALT',       'R@&fl%iMfgM>Yj4r;PfW|1Q0.^eKF>h<i3h^=)_%^!hQcQB4yBIikVkR,H/otGx[');

/**#@-*/
define('WPCF7_AUTOP', false );

set_time_limit(300);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ds_';

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
define('ALLOW_UNFILTERED_UPLOADS', true);
define('AUTOMATIC_UPDATER_DISABLED', true);
define('WP_DEBUG', false);
define('WP_HOME', 'http://'. $_SERVER['SERVER_NAME'] .'/');
define('WP_SITEURL', 'http://'. $_SERVER['SERVER_NAME'] .'/');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
