<?php
/**
* Plugin Name: WP CRUD BOT
* Description: Ejemplo Basico 
* Version:     1.3.1
* Plugin URI: https://guidorios.cl/wp-basic-crud-plugin-wordpress/
* Author:      Guido Rios Ciaffaroni
* Author URI:  https://guidorios.cl/
* License:     GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpbc
* Domain Path: /languages
*/

/******************************************************************************************/
// Archivo : wp-crud
// Funcion : 

/******************************************************************************************/

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

/*Importa funciones de instalacion*/
$wpbc_db_version = '1.1.0'; 

/*Nombre base de datos*/
$sist_name_file = 'crud_file';
$sist_name_departament = 'crud_departament'; 
$user_id = get_current_user_id();


/******************************************************************************************/
// Archivo : wp-crud-bot.php
// Funcion : Kfp_Insert_form() 'funcion para el ingreso de datos'
// Objetos : $wpdb->insert

/******************************************************************************************/

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Insert_post', 'Kfp_Insert_post');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */
function Kfp_Insert_post() 
{

    /*Variables globales*/
    global $wpdb;                   					// datos del sistema
    global $wpbc_db_version;        					// Version del base de datos - utilizado para las actualizaciones
    global $sist_name_file;         					// Nombre de la tabla de General del sistema 
    global $sist_name_departament;  					// Nombre de la tabla de Depart 
    global $tabla_crud;             					// nombre de la tabla de sistema
    global $user_id;                					// ID del usuario
    global $status_user;            					// Perfil del usuario 
    global $user_dirname;
    global $upload_dir;
    global $dir_file;               					// Nombre de archivo a subir
    global $global_data;            					// Almacenamiento de datos Globales
    global $file_name;  
    global $wp_session;             					// Inicio sesion variables
    global $global_data;

    $tabla_crud = $wpdb->prefix . $sist_name_file; 		// objeto base de datos


    /*Incio almacena informacion de formulario BLADE*/
    $user_id        = sanitize_text_field($_GET['user_id']);           // obtiene el id del usuario 


    /* ** carga de informacion en variables globales ** */
    $form_key_id = $key_id ;
    $form_nint = $nint;
    $form_date = $date;

    /*Fin almacena informacion de formulario BLADE*/




    $global_data = array(
                'user_id'           => $user_id,
            );

    $wpdb->insert($tabla_crud,$global_data);

}





























?>
