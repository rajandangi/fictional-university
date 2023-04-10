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
define('DB_NAME', 'fictional-university');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('WP_DEBUG', true);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pl93He7Ug7SznYRxkcUB3fg1/zoqVGwTat83YzcbadDENgcvm++JvqvcEh4Udx5ztkntUHpnlwgYeeSz55VBKA==');
define('SECURE_AUTH_KEY',  '69JigNglFYXSwycPECnmvVr1Xp+6MwgsIkekTnl19C2KKUU5PvZtYjYDFqGlyonpYj7UyAtrQvqu7U973vwN+A==');
define('LOGGED_IN_KEY',    '3dE3oi/ZXjTctPsIOdGXk9OLeWzOipmCjgycoMXl9OR/kafi2nPMPsVH35MJE9OxIqnAeB+qxbEwj6tFsfIFPg==');
define('NONCE_KEY',        'COZ89NZcx237yAy4QWHsUh74aQVxCfn1mflZvlVpLnPZPKGVDC3L+meO8JJ76Luzp68zc82V2lVZ7GfRGs4Kvw==');
define('AUTH_SALT',        '6hJVEvMAjoBOvo5GSb7cKozoOPGNo+u9Sdqirz7vyUREYXuXy0GWgA4imaO+gpBfefQpG85FO3jtRlbar5wvHw==');
define('SECURE_AUTH_SALT', 'neEEdT3q+E5MkjaZbhUXpkqF5AMLylK2FVKDaLg09TpovbOMheCw8NrgAmASMmzUlomqOICEIkPXIJ0oTGD3pA==');
define('LOGGED_IN_SALT',   '8cBJl46qg2G8/saE0nDqoXmQj3e2veG2tZrrLsLdvazcNrg0YUbJOuhNUHJF16bLmfPaNM2R5nFZGzyac5BlYQ==');
define('NONCE_SALT',       'pH+5CYrD0pMr0ra1MAI1lcaOBy6RQETKHzAxMu9V0B0IgIBC35Rxe4khLKYR4sUKmy9NM8Zly/D32GsbofvtGQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
