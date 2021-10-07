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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8c0+Ga9Pc0+OTz+R0K0apztcmXU9IsxNbkFBgTP08EDGMyx5T2GtxGTj1N0NlSyXQJaD4IWLhTTgpkJ8EJ7MNg==');
define('SECURE_AUTH_KEY',  'hQJ8Zbo+pfXZBS20226fWta8QYdZ+ddB+qAw9jcapetjTY4ced8SQ886RI0rbVevgHCQVggVGV4tiCJ2SBYBZg==');
define('LOGGED_IN_KEY',    'MPdjjCBQpX0HFWZ2jG0mUFoNo3RKy1joKB3FYr4Vgu08lpCXohU1oHbXCc0NPQR2vdPjNZWmIv+DB1XExa8lZg==');
define('NONCE_KEY',        '1/FtCX7H7Gav7C2z0Iyt3SLv84V78dTAp8Y9IURKdccDn9P7RVWIYJQwKPR1aBXB/8MCofCuDff3Ak6NOxTi2A==');
define('AUTH_SALT',        'Rynp6S1pkC6rLtS9mROVEt2Mt4F3tyuSIQN6QUu+KSWH/JdHYoDG7At62RlLR4ldAgUAzBe4dPpQVTigGtpklg==');
define('SECURE_AUTH_SALT', 'lnKFbOAHFrygs8zfbRSXvmYEy2/1tUNvSLCRFIGG0aSrFel4oL96dDVaotR8GyxV+tFH2/2haC1X3+YkfL9A7g==');
define('LOGGED_IN_SALT',   '6OiVzC9WnCedZe/5SWFHyabJn9PuskmocXZzgHcop2VmSUDttIPwhezAoyL7AfqSSBxdir+0Yp9tygWqwR2Dqw==');
define('NONCE_SALT',       'yvOb9CzK4tT6lvRPZRjhbFk6Ggcjcfv9/SCfIYc+DmgELugbtx9G66OqenOS8G2O5w2GC+7W2pHbWuGo8rIwkA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
