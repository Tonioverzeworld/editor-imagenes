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

    $nombre_copia = $_REQUEST['nombre']."".$fecha."CMYK.jpg";

    $image = new Imagick();
    $image->readImage($url_web);
    $image->setImageColorSpace(Imagick::COLORSPACE_CMYK);
    $image->profileImage('icc', file_get_contents(DIRECTORIO_PERFILES."USWebCoatedSWOP.icc"));
    $image->negateImage(FALSE, imagick::COLOR_CYAN);
    $image->negateImage(FALSE, imagick::COLOR_MAGENTA);
    $image->negateImage(FALSE, imagick::COLOR_YELLOW);
    $image->negateImage(FALSE, imagick::COLOR_BLACK);
    $image->writeImage(DIRECTORIO."/".$nombre_copia);
    
    $pdf = new PDF(DIRECTORIO_WEB, $formato, $nombre_copia);
    $pdf->generaPDF();

}else{

    
    

}


?>