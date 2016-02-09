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
define('DB_NAME', 'moviestore');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', '=0oTKu&I+/;;DNQ^|]z-Leby`&_6p#!7.OjPqV #q~;0=e&}+kn=kana!<GZ`s*D');
define('SECURE_AUTH_KEY', 'xy>9ce7hRD@Qo=o;@ #67/@6VMpKtc;+I!:6iRfO5+G]1U9|iFhu~HHlg)E7leDj');
define('LOGGED_IN_KEY', 'ZQwbgfU#gmO<j$CNm[J1bsEMoHfs_Go:&I|&2GD:6L2WcE-X--JFu)~#R(?OaQl~');
define('NONCE_KEY', '7(mm&G9HqX+mYW~/J+;-|,uy,/z:vsy{EtD5nf;Ea$iFULE@VGE$xQW{WAOqi`8]');
define('AUTH_SALT', 'c;g6-5rh9gdT;+:~V Tbd+2}]Mb7H04H8b`np6(=.pXZ;6tcty)x,veAKY(*jf=k');
define('SECURE_AUTH_SALT', 'JZ $mEF+50WhM:I8;R6pnP<.@z|V. LVu>BO1yed|ZE`MK/Od0`rO$q+tV,X:-e)');
define('LOGGED_IN_SALT', 'wHI<3io[_`NrT|`i/mqbGr 0n18#H kcJ-c{4VK*Rv|1u^O8MOLdto,_dQ^_R&Xb');
define('NONCE_SALT', 'hLb9g/%e}b+D|vw.RKBP-8R@fGVUpW,> H+n3g({6 MpwfjP9@$S 3^G(rjZIOoh');

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

