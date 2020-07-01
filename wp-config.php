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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mylocalhost' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'U}Qh29.3]cdBnrYWmmAcL!/_,ldb#fg0z{4a;z8BydP- /my#>6g0x)8il~Oh}>f' );
define( 'SECURE_AUTH_KEY',  'K2*)?xuozIV!1^i)4EEZ9MB7QbCxbW=n2YG7~|:g})BNji{z.M]f~2-aonM2TpAC' );
define( 'LOGGED_IN_KEY',    'G1HqepX1/jdd5[1f(tE;wC*Pa1i_S=8xAdgkSna(2PiPs%oq:pdlHJOl8mO2vAwl' );
define( 'NONCE_KEY',        'NM6>9FJTfSKoK85F2U(^=Fv|ndxSndZgK59Ev]*vvlnt]/$mtfA6f>^C0w|JV7[7' );
define( 'AUTH_SALT',        '5ae+E9}/:+ET()C1711HzO6$p(9.j:88rzjMk6p!zM $.1*uivOUup?tyI9o3^w ' );
define( 'SECURE_AUTH_SALT', 'QHzOQ],H^sw+ $]+O$y 9[&U!z[ntmapf)Q99#dbYrH,8seKhLk(CZckkM d,&7.' );
define( 'LOGGED_IN_SALT',   ';8g*Tz.(%ItB25Cpr.2y(n&UXd9G#9q?/Y9I1>=|v-i!H>G{zHYw=6Ph`#YhWEG.' );
define( 'NONCE_SALT',       '$^Cqox%TXl`#a,%X4rr)NTCJQ]#Sg3tq}%.&t(/=-/3Hj=nB0G=moy](+.;7I3#!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
