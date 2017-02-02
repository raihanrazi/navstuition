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
define('DB_NAME', 'navstuit_wp2');

/** MySQL database username */
define('DB_USER', 'navstuit_wp2');

/** MySQL database password */
define('DB_PASSWORD', 'X&2[NUDEe~47^]7');

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
define('AUTH_KEY',         'XwidreAxEwEgcf5iaS3G8CuXRJkFrCdRYGcgpP5VcMZk0R5B3TpmLr6lyLI4HEKU');
define('SECURE_AUTH_KEY',  'ZsiEKVeGTcro7PR1Sp3GZSxPSL3iyrFKm8mRn1W8bDNJEovlXAUeWeZ7tU0yfZPl');
define('LOGGED_IN_KEY',    'KjTTOhOBaSkeD5NJ7n3z0v3s3Pkz2h8CcA6E5JC077QZatGiJ3NAO9ao6rqHLL6V');
define('NONCE_KEY',        'WhlcEubNEbZgwRE5kaJlXpEo2vpT2Yx0H71ZcwDFV1ybquaX7eSfNXBtVkWyKkB3');
define('AUTH_SALT',        'nx9ciN3ui7hHqhImrFmnM0N5MhnjfVXKFZmWgV0ZsCyIhoRKUiJtxuBOjU2qku76');
define('SECURE_AUTH_SALT', 'xzg9AWAkbc3E3CuH0YLuE5rwMisxj93Qt8JnbCyk1hXHud0GAWrvFL71SjGcCG8T');
define('LOGGED_IN_SALT',   'Wk2e8Oz7hagPdAZgyRcEggZ7K4T5TH92RnY0MDMTPssT8Fj1dKYnAfqjmrcFZLAN');
define('NONCE_SALT',       'TRBEryhzIjrX4yFS64ZYeBMBHfz4wDQksE33wGnN0TMXwadl5UsH2xenaxlbNiQN');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
