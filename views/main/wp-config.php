<?php

/** Enable W3 Total Cache */

define('WP_CACHE', true); // Added by W3 Total Cache



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

define('DB_NAME', 'i2239852_wp1');



/** MySQL database username */

define('DB_USER', 'i2239852_wp1');



/** MySQL database password */

define('DB_PASSWORD', 'L.XppMJxixM56LfLsKC41');



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

define('AUTH_KEY',         'zVdXBsJSs8XA1PM6FbMtvd36DYTO2OF1m6V7sk1OoCMTCjJuO3HP4KwxXDyO7Cy6');

define('SECURE_AUTH_KEY',  'qgtAaW9lrKfYDI9kThp3wZWoUAD23v58MiwCNy62SGmaGaGpKcNpHVuwYRaU26Fx');

define('LOGGED_IN_KEY',    '3Ae9sOvoomPTuqvXfgCYoMjSvQoryzTX7pf76AoZVh6cTsgtwlHIn809ei7VUlgh');

define('NONCE_KEY',        'TcOSMTSSlZk93szGdZslw0JqChPmLzbWrQ1Es4TLhxRLa2fqz1s95UaDhvF0i6nT');

define('AUTH_SALT',        'xWQICWRSAl8kAI6Snz1ysKgibYZIZuHBySwFOhvBAUyogYxSvxt4aZvB0ae6GOtV');

define('SECURE_AUTH_SALT', 'ZN5DNmCW2ntrn14iGVatUsbVNWzat8yMAHHEO6hyKUfXRseKzgmlaXpbmVCZ6l7J');

define('LOGGED_IN_SALT',   'yX4Us5rBp5sPl91p1C9WvPE57hYYo016wiYDJ0vvXQiXlPW9u7dzO2fpnctNzpHN');

define('NONCE_SALT',       'Ru6A6Zyv8lcDTKfkN433hpG2S9BkWpdvanxmEqSgqMTERCtaqaZNcc1CELdGdJny');



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



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

define(‘ALLOW_UNFILTERED_UPLOADS’, true);