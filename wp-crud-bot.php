<?php
/**
* Plugin Name: WP CRUD BOT
* Description: Ejemplo Basico 
* Version:     1.3.1
* Plugin URI: https://guidorios.cl/wp-basic-crud-bot/
* Author:      Guido Rios Ciaffaroni
* Author URI:  https://guidorios.cl/
* License:     GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpbc
* Domain Path: /languages
*/

/******************************************************************************************/
// Archivo : 
// Funcion : 

/******************************************************************************************/

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

/*Funciones requeridas para administrar y gestionar */

// Funciones requeridas para gestionar archivos
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');
// Funciones requeridas para gestionar la base de datos
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


/*Importa funciones de instalacion*/
$wpbc_db_version = '1.1.0'; 

/*Nombre base de datos*/
$table_name_ping = 'crud_ping';
$user_id = get_current_user_id();


/******************************************************************************************/
// Archivo : wp-crud-bot.php
// Funcion : Kfp_Insert_post() 'funcion para el ingreso de datos'
// Objetos : $wpdb->insert
/******************************************************************************************/

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Insert_post', 'Kfp_Insert_post');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */
function Kfp_Insert_post() 
{

    /*Variables globales*/
    global $wpdb;                   					               // datos del sistema
    global $wpbc_db_version;        					               // Version del base de datos - utilizado para las actualizaciones
    global $table_name_ping;         					               // Nombre de la tabla de General del sistema 
    global $tabla_crud;             					               // nombre de la tabla de sistema
    global $user_id;                					               // ID del usuario
    global $key_id;                                                    // ID del usuario

    $tabla_crud = $wpdb->prefix . $table_name_ping; 		               // objeto base de datos

    /*Incio almacena informacion de formulario BLADE*/
    $key_id         = sanitize_text_field($_GET['key_id']);           // obtiene el id del usuario 

    /*Fin almacena informacion de formulario BLADE*/

    $global_data = array(
                'key_id'           => $key_id,
            );

    $wpdb->insert($tabla_crud,$global_data);


    echo '----->'.$wpbc_db_version.'</br>';
    echo '----->'.$key_id.'</br>';
    echo '----->'.$table_name_ping.'</br>';
    echo '----->'.$tabla_crud.'</br>';

}

//http://localhost/wordpress/api/?user_id=222&key_id=111



function crud_install()
{
    /*Variables globales*/
    global $wpdb;                                                      // datos del sistema
    global $wpbc_db_version;                                           // Version del base de datos - utilizado para las actualizaciones
    global $table_name_ping;                                            // Nombre de la tabla de General del sistema 
    global $tabla_crud;                                                // nombre de la tabla de sistema
    global $user_id;                                                   // ID del usuario
    global $key_id;                                                    // ID del usuario

    $table_name_file = $wpdb->prefix . $table_name_ping; 

    $sql_file = "CREATE TABLE " . $table_name_ping . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        key_id VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id)
    );"; 

    dbDelta($sql_file); 
}

crud_install();



?>
