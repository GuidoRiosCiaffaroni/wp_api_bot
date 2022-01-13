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
// archivos     : wp-crud-bot.php
// Funcion      :  
// Objetos      : 
// Descripcion  : Conjunto de variables para el uso del sistema
/******************************************************************************************/

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

/*Funciones requeridas para administrar y gestionar */

require_once(ABSPATH . "wp-admin" . '/includes/image.php'   );  // Funciones requeridas para gestionar Imagenes
require_once(ABSPATH . "wp-admin" . '/includes/file.php'    );  // Funciones requeridas para gestionar archivos
require_once(ABSPATH . "wp-admin" . '/includes/media.php'   );  // Funciones requeridas para gestionar otros archivos
require_once(ABSPATH . 'wp-admin/includes/upgrade.php'      );  // Funciones requeridas para gestionar la base de datos


    /*Variables globales*/
    global $wpdb;                              // datos del sistema
    global $wpbc_db_version_data;              // Version del base de datos - utilizado para las actualizaciones
    global $table_data_server_name;            // Objeto de Base de Datos
    global $data_sql_objet;                    // Nombre de la tabla de General del sistema 
    global $sql_query;                         // Nombre de la tabla de General del sistema     
 


/*Importa funciones de instalacion*/
$wpbc_db_version_data = '1.1.0'; 

/*Nombre base de datos*/
$table_data_name = 'api_rest_data';
//$user_id = get_current_user_id();



/******************************************************************************************/
// archivos     : wp-crud-bot.php
// Funcion      : Kfp_Insert_post() 
// Objetos      : $wpdb->insert
// Descripcion  : 'funcion para el ingreso de datos'
/******************************************************************************************/

/**** Inicio procedimiento para ingreso de datos ****/
function Kfp_Insert_post() 
{

    /*Variables globales*/
    global $wpdb;                       // datos del sistema
    global $wpbc_db_version_data;       // Version del base de datos - utilizado para las actualizaciones
    global $table_data_name;            // Nombre de la base de datos
    global $data_sql_objet;             // Objeto de Base de Datos
    global $sql_query;                  // Almacena la consulta  



    $data_sql_objet = $wpdb->prefix . $table_data_name;                        // objeto base de datos

    /*Incio almacena informacion de formulario BLADE*/
    $ServerDate         = sanitize_text_field($_GET['ServerDate']);            // Fecha del Servidor
    $ServerName         = sanitize_text_field($_GET['ServerName']);            // Nombre del Servidor
    $ServerArqu         = sanitize_text_field($_GET['ServerArqu']);            // Arquitectura del Servidor
    $ServerKernel       = sanitize_text_field($_GET['ServerKernel']);          // Kernel del servidor
    $ServerFilesystem   = sanitize_text_field($_GET['ServerFilesystem']);      // Fichero de Archivos
    $ServerFilesSize   = sanitize_text_field($_GET['ServerFilesSize']);      // Tamaño de archivo 
    $ServerFilesUsed   = sanitize_text_field($_GET['ServerFilesUsed']);      // Tamaño de archivo 
    
    /*Fin almacena informacion de formulario BLADE*/

    $global_data = array(
                'ServerDate'          => $ServerDate,
                'ServerName'          => $ServerName,
                'ServerArqu'          => $ServerArqu,
                 'ServerKernel'          => $ServerKernel,
                    'ServerFilesystem' => $ServerFilesystem,
                    'ServerFilesSize'  => $ServerFilesSize
                        
                
            );

    $wpdb->insert($data_sql_objet,$global_data);


/*
    echo '$wpbc_db_version_data         ----->'.$wpbc_db_version_data.'</br>';
    echo '$table_data_name              ----->'.$table_data_name.'</br>';
    echo '$data_sql_objet               ----->'.$data_sql_objet.'</br>';
    echo '$sql_query                    ----->'.$sql_query.'</br>';
    echo '$ServerDate                   ----->'.$ServerDate.'</br>';
    echo '$ServerName                   ----->'.$ServerName.'</br>';  
    echo '$ServerDate                   ----->'.$ServerDate.'</br>';
    echo '$ServerName                   ----->'.$ServerName.'</br>';    
    */    

}

add_shortcode('kfp_ShortCode_Insert_post', 'Kfp_Insert_post');  // Crea shortcode en la pagina de inicio 

//http://localhost/wordpress/api/?user_id=222&key_id=111

/**** Fin procedimiento para ingreso de datos ****/

/******************************************************************************************/
// archivos     : wp-crud-bot.php
// Funcion      : crud_install() 
// Objetos      : $wpdb->insert
// Descripcion  : 'Funcion para la creacion de la base de datos'
/******************************************************************************************/

/**** Inicio procedimiento para crear la base de datos ****/
function crud_install()
{

    /*Variables globales*/
    global $wpdb;                       // datos del sistema
    global $wpbc_db_version_data;       // Version del base de datos - utilizado para las actualizaciones
    global $table_data_name;            // Nombre de la base de datos
    global $data_sql_objet;             // Objeto de Base de Datos
    global $sql_query;                  // Almacena la consulta      

    $data_sql_objet = $wpdb->prefix . $table_data_name;

    $sql_query = "CREATE TABLE " . $data_sql_objet . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        ServerDate VARCHAR (100) NOT NULL,
        ServerName VARCHAR (100) NOT NULL,
        ServerArqu VARCHAR (100) NOT NULL,
        ServerKernel VARCHAR (100) NOT NULL,
        ServerFilesystem VARCHAR (100) NOT NULL,
        ServerFilesSize VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY (id)
    );"; 

    dbDelta($sql_query); 
}

crud_install();

/**** Fin procedimiento para crear la base de datos ****/






?>