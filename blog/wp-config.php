<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tfkids_blog');

/** MySQL database username */
define('DB_USER', 'tfkids_enjoy');

/** MySQL database password */
define('DB_PASSWORD', 'funenjoy987456');

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
define('AUTH_KEY',         '|r<a8Ro#aiA? ]sB w|x$# g2rQlMw,;;J9-3}6rmv`KbpoC%y [6w-cz>?/q3$2');
define('SECURE_AUTH_KEY',  '-he4_p3Q2Tc#us-dXtx)No;|`866U5N:t}jzdb-jEa&]Us$eV 7=TZ{2ku?V;?T=');
define('LOGGED_IN_KEY',    'jSS1}y]xjI-{yrG9(|taMu4MzU$ -%NxcSr*Q7 4UHz@& q^6w@n a8PF`,+~X2-');
define('NONCE_KEY',        '9.:K~E=y=UW_M5) v#e@%k5=n/w8K]WvR+MK^Ci?+n?D0$K+i$KO;MR%OK!z+t]N');
define('AUTH_SALT',        '(0NM{LR5_Z&q6hyB3oeQS[-<-c-~q3G(t+,;sCY&U{RY+Tj>yg[>JA5J>p1+@JsZ');
define('SECURE_AUTH_SALT', '=(qeKxi{S*A!%#mpV`]A@~QU1@ov32s^I.%LKH6M4+]9v#74h74/:>:+{!b>@kY%');
define('LOGGED_IN_SALT',   '+K2mc|G>.uh%zmv7xNHgH_y;y`?)./kz0;kr%CZ>`F+4V9vp7YZ|, }mQqLseBAf');
define('NONCE_SALT',       'g,_Ihq4;[H}$8YxE-SaPd:wc0dx5:gvL1N|rtl?U2h[54Pst<x~x+>%!a^CA_(XN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
