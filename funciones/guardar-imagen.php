<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include('constantes.php');
include('./controladores/pdf_controller.php');

$data = file_get_contents($_REQUEST['imgData']);
$formato = $_REQUEST['tipo_formato'];
$fecha =  date("Ymd-Gis");
$nombre = $_REQUEST['nombre']."".$fecha.".jpg";


$url = DIRECTORIO."/".$nombre;
$url_web = str_replace($url, DIRECTORIO, DIRECTORIO_WEB."/".$nombre);

if(is_dir(DIRECTORIO)){

    file_put_contents($url, $data);
    
    $pdf = new PDF(DIRECTORIO_WEB, $formato, $nombre);
    $pdf->generaPDF();

}else{

    
    

}


?>