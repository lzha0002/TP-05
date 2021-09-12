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

define( 'AUTH_KEY',         '?05)jp_r]Db9>&b=Y[V`P38OzbIOb41vdbB|z}U9I,-uvEN.u3|_4d#e$7lYbXFv' );

define( 'SECURE_AUTH_KEY',  'RHf9?bwI)LeU/Feu;jt;HgA%(>]OgdiY6BAj$H@ZBqc|yH55^iK+FBo{%{SRt/wc' );

define( 'LOGGED_IN_KEY',    ']rjD3Fb#-j@s=:a(!uwYnP~Ta<$c^LA9@yd-Atq7aT[1O&buA2rtT^rWD^tK:@e#' );

define( 'NONCE_KEY',        'wz8V<a:v;>#6<Lk[2gpcba>?.W&RoW?^|c]2i*CHawEN L%i:Zr2I0%_,}TI]bxy' );

define( 'AUTH_SALT',        '$O)!b}j>{q6fWV*:p^2I-P&wfKTZtC>lzeWs@WI{qh#N3fzw dp+L%X52xt/Y)s`' );

define( 'SECURE_AUTH_SALT', 'Wf][G:eK]w*Nm)ATK/^Ee78*x12Ci.IzFyjY(H&b_,=b.rRHw0gT.cz6A6g!VE7E' );

define( 'LOGGED_IN_SALT',   '#pgCVolFR3Z NM5g~0 A.gpZRiFJ7|~zt:_twD{Awzg66~G|SFUm(GiC!a}=@`6,' );

define( 'NONCE_SALT',       '`(lXOph~dIaVuz&Ptn>C UUFUuQ;C5~Yrf#NhpA)9bllW]vem13J1H#.%9a(0<cm' );


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

<<<<<<< Updated upstream
define( 'WP_HOME', 'http://localhost' );
define( 'WP_SITEURL', 'http://localhost' );
=======
define( 'WP_HOME', 'http://localhost/iteration_2' );
define( 'WP_SITEURL', 'http://localhost/iteration_2' );
>>>>>>> Stashed changes
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
