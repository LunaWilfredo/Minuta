<?php

// conexion

//controllers
require_once 'Controllers/tituloController.php';
require_once 'Controllers/actividadController.php';

// cabecera
require_once 'Views/layout/header.php';
// menu
require_once 'Views/layout/slidebar.php';

if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == "Alist" || $page == "Aregister" || $page == "Aupdate" || $page == "body" || $page =="MinutePdf"){
        require_once 'Views/content/'.$_GET['page'].".php";
    }
}else{
    require_once 'Views/content/body.php';
}

// cuerpo
// require_once 'Views/content/Alist.php';

// footer
require_once 'Views/layout/footer.php';