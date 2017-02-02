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
define('DB_NAME', 'navstuit_wp1');

/** MySQL database username */
define('DB_USER', 'navstuit_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'Z~96Qn2r8#64(*7');

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
define('AUTH_KEY',         '8WgDuspJ8zg7ZMw7vtxbBMcXmsoMQxs7t0ATpdRRVArb4oIelD3NS0iFSjlCPQSK');
define('SECURE_AUTH_KEY',  'AtpRdXrA9anHEXuFE3ExvvGr3xjjwd67Ol2ywEWe7qStX5lGaNvaIXtvRTM6snmT');
define('LOGGED_IN_KEY',    'EIkVDap3ADu4IvB5sRWFaicMubda9sx9EmwWJCBM1cPLstwXqWsp2YUmSy9i1jBD');
define('NONCE_KEY',        'PZQGrG994fVsxY4vAkyNd7xOm03xjZ7IMbzpRWWznEmQDaghIg5wAyz8VQIb7UH3');
define('AUTH_SALT',        'cqQbTUSH8uXfTUy86LMrOMWBBmEClZF9PohZwzlC9luWJxnOYH6o8PsjLNROMWTm');
define('SECURE_AUTH_SALT', 'FQwcvw25ZKJsfjwbQYSkiwsbXHLYOC0PELAXhgI669RDAUZGPIIiCrCgeY11jhPU');
define('LOGGED_IN_SALT',   'IHJmpS2041Kjc4CiBpiKb5pzhkkQhfKv31q2IW4m8DjsGaMDeEe3P2ZEniR0OHNQ');
define('NONCE_SALT',       'hl9gW2JSap65Uuk7QSe878kq3LL8TqgA9rnohImIbVPXak0jXjTomR4WE7QgG9Q0');

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
