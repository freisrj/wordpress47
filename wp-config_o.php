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
define('DB_NAME', 'wp47');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'a- ^QSzq:UL Sp!Pq[<o[_+N74dihVn9|24tRSlx<9]%u9hZz4WebgKjD+b%)5T]');
define('SECURE_AUTH_KEY',  ' bKTK<>*QJgx]!7d=-H:?x=T%jJd/p2})!#H6<M7@lp7DS)9T: -~Tm DPhu>l{S');
define('LOGGED_IN_KEY',    'xTb<B7*:S<n)_@xhE7q50Z2FanVRVh!(YVwE:lw;N5=NHQpLENV>)<Sny(_;O$(W');
define('NONCE_KEY',        'z ob<vW2x?+g&/H.A~Kl/6eNPkIx_HB{x6VCQNf:Yk|_Q!&4).B8CEJJRM5zFeKv');
define('AUTH_SALT',        'uD*pz5k-!1.$6zU1i(S;,K39?eW8,8AFv8OneP/I3O5v%KECJkJT}w#iSe#q#w`{');
define('SECURE_AUTH_SALT', '0h4Az;2=9M(<Ct|!7eJ|ew4IRZo#>|m|76$S$Jgk6_5vL}UHQe 2CQlFJDJ5|Lzs');
define('LOGGED_IN_SALT',   '(EjE#1hL?,8{SS[&W&N#+9i*e9GfcFE(KHjbAW+&3>jC,eiakMPZTb--%B3vlDS.');
define('NONCE_SALT',       'eTx`@00<G_8k5*tJ0Ju7NVONlTG)+al~-r!fN`yBRu&O/tO;Tm0i`<<|3:9:JJZj');

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


/** Increasing memory allocated to PHP */
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );


/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');




