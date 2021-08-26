<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the web site, you can copy this file to "wp-config.php"

 * and fill in the values.

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

define( 'DB_NAME', "wp" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "root" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication unique keys and salts.

 *

 * Change these to different unique phrases! You can generate these using

 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.

 *

 * You can change these at any point in time to invalidate all existing cookies.

 * This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'XlU-*Rdd>Vj?pqYa=M6V+@n @{0thy&W?D7=q0Ta~Za6$IGua<_G%uvoa2RA2!F=' );

define( 'SECURE_AUTH_KEY',  'R}gu)U[VPesi:_my2X=t4ET(bqQMK][dkn!:gdk7-&B-8_[7G?AC``;k5]1T.s(O' );

define( 'LOGGED_IN_KEY',    '(aCUrg;A>r^Ue6n~-a4I]jflEnvXv^]k0*Lc~7o|Z5DuVXWOob_mPf4gI##gPRxA' );

define( 'NONCE_KEY',        '<XO#)dfE&!5/c0^x3UK!<0 FxcbAr&r/Uo$*!QBZz>BQN9J_CAm)n#($CmRb#F+L' );

define( 'AUTH_SALT',        'Wy%Ka}9`._V;Ww)LQ>yTNpzrkBL:EE{Zs@s8 L(fpZH`giQ5rb.*m}@wN[0u~GiV' );

define( 'SECURE_AUTH_SALT', 'hLE|E]pm8qU)1Dx-qX+WO){ue^^7733HSf($]MV:sY.@IOt/?jr{:=1Jisptj0 2' );

define( 'LOGGED_IN_SALT',   'mq>etG0UXpzk;:D}~k/]4I&s/G&u1gY7,LX3aAf^ ?c>%3-u (bE;8he)MBtO=V]' );

define( 'NONCE_SALT',       '%pr=v]e|qy[RzA@,XAij/*55Sal<PIS]Y3Por6$=K:IZ#__s1CxLk-:!M47nxjW,' );


/**#@-*/


/**

 * WordPress database table prefix.

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


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://localhost/interation1' );
define( 'WP_SITEURL', 'http://localhost/interation1' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
