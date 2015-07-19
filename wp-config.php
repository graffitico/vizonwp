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
define('DB_NAME', 'sushant');
/** MySQL database username */
define('DB_USER', 'adminpXsiYuE');
/** MySQL database password */
define('DB_PASSWORD', '_DsVJ2WwEdZl');
/** MySQL hostname */
define('DB_HOST', getenv(OPENSHIFT_MYSQL_DB_HOST) . ':' . getenv(OPENSHIFT_MYSQL_DB_PORT));
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
define('AUTH_KEY',         '?|kzb:5F2v%tL^-&V4Fsns(,Bn/]L&nY:lPerE|xFY&u4~]4U^YNb-U;d,B;V42G');
define('SECURE_AUTH_KEY',  '9K->8EQ/@yAs%K4gv(F?qFh-X-KQOj$m11%s*H?)f3ui!&?CXU68/O,M@*{`6RR!');
define('LOGGED_IN_KEY',    'u?+7uDQc6MGU)La(ub-U|yn|;HQaiX+Rfo36Jh[jJ%GkkMw3@lk}beW$+J*9|/E-');
define('NONCE_KEY',        '%wmPFgup3u.K(.fZ$gWwMyJGNB#AvtWydpB-UD[9~E*r^ho8C4r(xm<dpuBgQILV');
define('AUTH_SALT',        '^ !>6^@}lF$:[Y*l1ob$H&oS4vT:*~fv)d|X8j}7N|i%)j0-7)9@7yovy3SPkp*o');
define('SECURE_AUTH_SALT', ')-{JedT}Au<egXsJ5Dhx|kz!:#Z=1==1|T@-g{U4u3+v|*P-[9];&Js #FM%U])R');
define('LOGGED_IN_SALT',   'XeW*zPg--{0ZWQz=J?A+Te[O)Xk^QJv63pnl9RQB8j,dljh_g/Z;kI<ZMm-jXCK9');
define('NONCE_SALT',       '}:wSfYJpido_fRW}AnK6iE1^2~kb06`hqD3%Ex2kkL3:x!PX^+x32-M`4 jhff;(');
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