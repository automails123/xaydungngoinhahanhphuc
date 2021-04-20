<?php
define( 'WP_CACHE', true ) ;

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
define('DB_NAME', 'vodanhc2_xaydungngoinhahanhphuc'); // vodanhc2_xaydungngoinhahanhphuc
define('DB_USER', 'root');//root vodanhc2_xaydungngoinhahanhphuc
//user_admin:xaydungngoinhahanhphuc pass:Xaydungngoinhahanhphuc@2020++ git : Nguyenvanhoach pas Khongthequen89
/** MySQL database password */
define('DB_PASSWORD', '');// user:admin pass: Xaydungngoinhahanhphuc@2021++

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
define('AUTH_KEY',         '/B s/`:+ElyBDo]KlMzX:2QOP^:dQ-tJ7=YMVE^FJK:`dhFG[9-^yLe 9i9I-PfV');
define('SECURE_AUTH_KEY',  '|8mnBV>;3eNHrg`e]*hn?E:;((s :n+l)3=R/nrt5@3?1;S:U$@>.xxtdRI/}sgW');
define('LOGGED_IN_KEY',    'kdXMR`_bE5t,;mOMO9iT!R,5Oww)u}%J$|up,a:92FG}2R4r)Er3XDTl1m>w;E_u');
define('NONCE_KEY',        '#{57:$n)Br8`dM)8oVu-R.3XN#^/rH]m6.<B*vE6^sb{[8Nfm+l5J;7,wkkfP_J+');
define('AUTH_SALT',        '?P5,O=K`Kj}X:*T,aj!mgT]HfHWxk>z.s^Wg3.b!E>B6A4UNT<0R,Td1eynkT=U`');
define('SECURE_AUTH_SALT', 'fw3}vF=0: d1BfV`$K2R%}!S!Q^c~T#i;K?&q1~vsn@W}V;=V(M-{<e3MiBd%m#+');
define('LOGGED_IN_SALT',   '9S=W>ol>1cM_jsJCsBEa)a1=TK:Wuw%nn4%ug6|MX9SeY$pF6Kw**bHe(G|xlL-$');
define('NONCE_SALT',       '7hZS7sD;{KFnOh^QLg R.CHEbFlvc$L$EOg#;wJ.U29g#m!td$~lm-v>Cz7G=qef');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hanhphuctbl_';

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
define( 'WP_AUTO_UPDATE_CORE', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
$memcached_servers = array( 'default' => array('/home/vodanhc2/.applicationmanager/memcached.sock:0'));