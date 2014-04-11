<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cochran_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '+JuX#wnp3~rph(G`VA&<j5GddqP2_q%biv==kls>9[IB[06Znc=qt(TDLfam$sOy');
define('SECURE_AUTH_KEY',  'wnppkpp.Bxp}`#tK3Sr,Y/y*sE[c}+ND{;EJ&,TuTtsJ#(P~%95OD2uaE6}vLWc5');
define('LOGGED_IN_KEY',    '[cob6Pm<luIB^Pd;|K|^IS{cl`do(w*U&|IMpU&E,KIu@RHJm:sl!=D`Gvy|VLdu');
define('NONCE_KEY',        'I4bD];ut7}+2J5R*vMEY?VoI=|m&?Z9./Y29*ZTAj;foQ`m3!_Fm!(vB@%_,BRnT');
define('AUTH_SALT',        '*H$4F4E}G~tCw^7<zpt:>N}Ifcpk]c_j-uxboRNQ ElpF=]a l_2.?,JeJVQ]S;N');
define('SECURE_AUTH_SALT', '{g5S3@s=}L;)6D_;1`~I)nc[BLnKBd(g>e~X3,Oa-ZYh0+s/B+U$P.b+/Ul(Y?q|');
define('LOGGED_IN_SALT',   '?=zRpXq_;dGdLvsCm|r|q=kOmJQ)FM[*/qPXPNuA+k-Xp;LBm8-K%h)wpF~MPbLG');
define('NONCE_SALT',       '><qysUK-aIj+Q]qhO:I(D:`Mg5mZ}1pX{OU2m%9mE`y$FFLcV0[9inx_-E^gR-S`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
