<?php

require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if(isset($_GET['id'])){
    ob_start();
    require_once 'Views/content/pdf.php';
    $html = ob_get_clean();

    //recoger contenido de otro 
    
    $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->output("Minute".$_GET['id'].".pdf");
}