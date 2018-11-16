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
define('AUTH_KEY',         'kt,B{W5)#UBET^8.QNQ:[RlsZs5E+@13.tr8-zoU,8((|X?(y.S:_u(Q6cA.v.AS');
define('SECURE_AUTH_KEY',  'QYg1Rz_A}N,zDPUIB83@vsqX9,^q?<(UrU#SudV,kJpb8G8$xj,!d!AwbUNO]}J2');
define('LOGGED_IN_KEY',    'v(.zLN_b|B,$@,{KA@+zv;X*Exr(9H~F(z=fl7s@3F2_y(:r9E;UL<p,ol-PB$h]');
define('NONCE_KEY',        ')qSHiv62la/97[#sG0dSwp@.D8@5$RH^fy~|BBbkSs+,O|Aie}H]6 Gh%KPD_q5`');
define('AUTH_SALT',        'c8TB7He;l`GouEAXhrMd$U/*/*bBY~z8vn)f=?Q{`8?dNn}Kiv2lsKY$xY5V~G@p');
define('SECURE_AUTH_SALT', 'g:IvU:THA^ykC2E }Jp]xX?F]LQ&}$}u!9[:o ~<a6?U04?pTUZ(w90^gnMom}.u');
define('LOGGED_IN_SALT',   '(H%[{Y9%Py=}pjj8J#USF}nU<~dv`j(W4=X<b/c,tsrVO;b++udSxb`vo8f*KgjK');
define('NONCE_SALT',       'u^~[g+t~1HF`#^-pr_|^n0 =j]%[i!P1+}n7q_oC!,%RZD::r%L+Wc=xU)kHg-D2');

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
