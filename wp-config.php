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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'praisethesun91');

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
define('AUTH_KEY',         ':x:%D#v<{HMM1wN>O+Ll5+|m=/H7vNUNq^n%|6I4[BUc]pt6JcEdf.U?})%,;q7h');
define('SECURE_AUTH_KEY',  'V_;:S6j,_(gxynezxfPt*ODi_1b?DwDvkMd,wf3;k7s!p4d:FQ-))O|R6&GH?Vw_');
define('LOGGED_IN_KEY',    'b^XD,%pb|6^9=6,5C.-1BcsE[|Y])M@qwEo G{T(Z+k+&#myIh2XOs] G;|3qu,j');
define('NONCE_KEY',        'TE-Qr|Q+eKYd[g;#5*6Sg0MZj}f@zh[exx],N}#9? zti)A^?|1(d_}oPTuzs#/6');
define('AUTH_SALT',        'xbC9ir+sW@~=jK|gTGH`tN!Np&Dtn5}kt}O9;DPVHO>9;Z;bQ)yb|r1Vd3DI)T?k');
define('SECURE_AUTH_SALT', '*BdU_hXGqrrCJq3.u-,l;E,wg.!NtMdLYFvyrb?+P].<I=Rd2`2Qtcg<~xYLdSLB');
define('LOGGED_IN_SALT',   'Xa|$nh|z*dx[s!F%cMqPsdS{41^)58b*t+Wk#v,as.1A@QpDW[jbEN y|}).2AD6');
define('NONCE_SALT',       'UAh^n+fK*3&`>1~B2YnPX|y420<rM),u+Y+)xvGhPxQadmH-Dp6B^Lx*{|2J0 ph');

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
