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
define('DB_NAME', 'tfkids_party');

/** MySQL database username */
define('DB_USER', 'tfkids_party');

/** MySQL database password */
define('DB_PASSWORD', 'prty98765432');

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
define('AUTH_KEY',         '{U>qCk]sy_+`s!Bq_)ms{Bz8p3j]O7R%WYSHwVh=XPjh{Yv7D^Zg-2Kwiq-kGcbA');
define('SECURE_AUTH_KEY',  'X|GR}z2_*rd>kGDc~Gpk5Wta`iiPAA7fa<a@aP}>hm&-8/(5tM9lIEKj/t<|8TEZ');
define('LOGGED_IN_KEY',    'TYkt-vdOj%@8wpL[zZ;XwYI<tv)yJQO!lbh6D7P[.?Y6Kk)&,SXDQ``H7teu6!Iz');
define('NONCE_KEY',        't|o^MWd|To}c/AFRiZ)<sscs2vFJR7>~/H5}1xFoy|[2vtm+-WU&rWubE{2w.9x!');
define('AUTH_SALT',        'y{yv^,=s(yiS~-e)98nk0:uY u{@^br?[7TRD1|Hx6JDlfPhp:Vl#TvY0#Xa8*5S');
define('SECURE_AUTH_SALT', 'Y%?R>oR:KtCq-Hs4XY{fbxAntt+PbX+lT!rLAFQ[XY)^T0=v};ank|/9-^(Q7Z^F');
define('LOGGED_IN_SALT',   '+(`}2,=G(!J|X-~x2}Q(>k`sB-Db;{k[]qCk?E7CS4-/Q7vO}[&+]wo>|*ik:wDc');
define('NONCE_SALT',       '3oW~xlWtW9kve&b9} tL?!Ny/|G}AAA2sP{eC!21nqi$r K^zPZIt$-6(wSi_R3n');

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
