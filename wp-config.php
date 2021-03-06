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
define('DB_NAME', 'konsaltoriya');

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
define('AUTH_KEY',         'u5vo0qfovpdg5vkfvwphacyvochqotbsqgpocuyk83iwabduugybdmnmntjwe1co');
define('SECURE_AUTH_KEY',  'hzofpnkf6ipd8yv4sfxl6u1dmgkbw4dezeauldrgsxzqeythzirjcf7mhm6sputj');
define('LOGGED_IN_KEY',    'zjvh5ipwc4fhfkdwoxbj35dbftzpqgdfkeb8pzcdrbwzvaifbdpdydsw8jdjreyv');
define('NONCE_KEY',        'bgh3vyv48xzhmxf3mjnmasribqof6sswwzsgesxx07bixlopac89qrtkihbzorif');
define('AUTH_SALT',        'gztzmjihpfesyp4zmwnurendn48juruo8zlojjt5jyejo8ck6n1vubgc5ap9yfgp');
define('SECURE_AUTH_SALT', '4k1u3k4xo4ymfzm9zbfauetkhnrdupn7ag4ilskccy7a3tg3mvqodbkmfsl596pa');
define('LOGGED_IN_SALT',   '3yiiv6pkas4k3kmruznycq9glgrkpucxwlgcjel20lrcvu8pfwvcwlmp7dklsldk');
define('NONCE_SALT',       'ric2xog4u8w2c9nzrhiccpxgo3ou7xf3vpn9ibveloholm3swcblky3hrzuddb4c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpde_';

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
