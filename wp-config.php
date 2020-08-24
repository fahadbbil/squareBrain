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
define( 'DB_NAME', 'squarebrain' );

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
define( 'AUTH_KEY',         'mS)/y?D!(41hE7d0_n4`y&H?UX1RgX.iKauoyo?$*7V{Kfs ]05mflxr.&h/]>9h' );
define( 'SECURE_AUTH_KEY',  'o)]*vrAq;piRf#F5q@czT?@32i2sT1d,fnD(P/:>bRqh:-TvUQ4}te=Uk,|W_{5k' );
define( 'LOGGED_IN_KEY',    '=+Qp:^Kq{T|I(H3!_**a6 fe$zHVp`c,t}kKjEHlHd5wW#OAEIYro{5lka8c(JOh' );
define( 'NONCE_KEY',        '`BE1g0Lv/lRM=#)Bpd3o(5NVKb Wy<e[v;s>8a<;#`zX*Y&dGdPvcHD^;+73C=Po' );
define( 'AUTH_SALT',        '[qW1 5!p_OW!20! t01)L^!R7L,v~%5>YemSbvxH29&/cd5,{i}IOuW;YQ,GD&^q' );
define( 'SECURE_AUTH_SALT', 'haSFMp3I|<EG.K=)5[xi1t!K5L7u%(q>/Yopf9@&L]%/+0rlxf{:g<(:1.J@GmeZ' );
define( 'LOGGED_IN_SALT',   'bU>b$jAYj1<?Lb{HJ6p9>$:NrdwjfmVl+{-on,*wzk9%S(u7Qi#v=@wR-#W&O9j2' );
define( 'NONCE_SALT',       '2H>qNDl*G)}3WEU.%m&/BLE65@gm1[_`>5[LO9*?&;AHU}Ht~t~T(O>3MCn6,iqY' );

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
