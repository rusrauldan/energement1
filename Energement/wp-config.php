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
define('DB_NAME', 'energy_management_system');

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
define('AUTH_KEY',         'hG8igkUT.o _iZX2-HsAIha|f(]p1Gv{W@j]l@iRFl]o>q!eOs6yZq$;Fv^9A3$K');
define('SECURE_AUTH_KEY',  '};3ix[c8,([3@h(Tk$JwKQ1[)1zZGO17Va^|A#Gfat)ULKz(qNPIGY3?1?D}8,|r');
define('LOGGED_IN_KEY',    'T;(cVJM3,]E,VEV)WL!Oz/o=qViMq`0~R^`3XX~}zdu5P1@,Wl4Ez[(hS0G+?w2|');
define('NONCE_KEY',        ' nn=ejtt(U;toBR-w0s,2J#:Ko%Z{f{Kc/pvm]t^dWwcqjjr~KAp^t;[HA)`.)#h');
define('AUTH_SALT',        'I_]lvb(EoEjweXg%:w/!#bV%_M%2:+r%Q]&rtlgIh<D7#q0o |&#mow+PhAw1_NS');
define('SECURE_AUTH_SALT', ']s-pK!`iD4;IbT+k< l(V7k`,3p2I9)m-y1V!oCN-B$0$b5#!W=;P<`rk6z`dDPK');
define('LOGGED_IN_SALT',   'rGM94_r.d68T/p3sOlhZyAKWlM/j3?}tmeNtt<*SLN8|OKnN){D_[QQ{a_8u$Fs]');
define('NONCE_SALT',       '<!cz?AHIRT?U>BAA8FHNMYaesGGr1V3Q<jXe7MLvrup@_*~DG]!t_G%K$4nB:@1v');

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
