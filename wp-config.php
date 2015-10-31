<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_contable');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'lieison2014');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'lieison2015');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'lieison.org');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'l_WHJEl>Ir6Z*c P%FBfe>6e.*_K:4oZEjJZ%lTfOfq<yd5>2C|mpV22lx#sW(6*');
define('SECURE_AUTH_KEY', 'K-@V=scvq-8y@}JU1K{e^X,^t7.8Gf~lD3o7EnrjaC%4wc@DO^<Vns#Y9Z`Q#>aY');
define('LOGGED_IN_KEY', 'ntGt9<0h$SNFyDhQPONA))RXHkitx<Z:4W +q-~6kw^9B~{>RFB#1J$u.m`2L!`$');
define('NONCE_KEY', '-&37^79brlWn-}H`]bF.upH>/(e0Lf,y;pD,jC+V$CYBg&)l]U6x#+8hb3<=UC O');
define('AUTH_SALT', '~]^gaV6=GL!|p& +WPZse&XUuJ}}4@UxT96Dp%8Ei&[;MJ}YtL?11YW|Gn=wWn*L');
define('SECURE_AUTH_SALT', '&?(o#uaH]oX{[yUQ&f$/ W)y i&Fxb{wRfOo~_aZ`$<iFIafa!dGJb;G3>vlT%pd');
define('LOGGED_IN_SALT', 'y._)6c^|t$u1p-|5YXV/mP6e:!V_pgPsZX(Pw&4tv<8A_c<,@bt_4@o%2~L EN~k');
define('NONCE_SALT', '.-gcD(wPf,f8z<=+,Hijq~?Bf!p/>@]W?Nn+qdzxC0p5:1BvQ>V{7q,#B$jV+]K9');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

