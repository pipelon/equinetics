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
define('DB_NAME', 'db_equinetics');

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
define('AUTH_KEY',         'kqtCaS5X=6<}A8uN;ua}Z2h$_@Tnz9kXd{Rtl]k495%tyN~{~X=@C=-95Tv{d#]3');
define('SECURE_AUTH_KEY',  '[Nxp!3mlIo/po3Z~B]%i<QjSxRHGmU8NIi#,f?%yfQyij&Mc?X5UG1g!yfOJ,)YY');
define('LOGGED_IN_KEY',    '6q0Ovv)j<.3,{pB.yh-mUh8r()e.L|2p{IP]-Hc[AB:^W6Xluz_=*c>cf)zJ.>Ac');
define('NONCE_KEY',        '(L<C CP>ZtsP/U<roh(rLK9%JBXD%B,zvK*G-U}<TO=l$SUnby=*,*6,*810GU%@');
define('AUTH_SALT',        '5[c()zj_t-OVDvzo^da+:C{$<fiA{?*tJ$5KPz~?puy/ujWtY2%)]Zq7C}u`NWs5');
define('SECURE_AUTH_SALT', '(bZ,1-CcU0zPl<dCftb|5%-|B7.%-! p_Be3cB0lp`1 U5cSWMByr1DK^t_MwAro');
define('LOGGED_IN_SALT',   '^C9V+KJ-3vcxLxI*.N!]v8UEoKz?%7p#/,eocOOMlUQ9qzD-_xpwOqDDZ`/KYA/ ');
define('NONCE_SALT',       'dbL]q^y (,1r41>C:!6vl$_[]EZM+1ROp~y5C3_D-QDJO6H6Bjoo2]J-mA 10*rh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'eqntcs_';

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
