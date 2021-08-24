<?php

require_once 'Models/tituloModel.php';

class Titulo{

    static public function registroTitulo(){

        if(isset($_POST['title']) && $_POST['title'] !=null){

            $tabla = "titulos";
   
            $datos = array(
                "nombre"=>$_POST['title'],
                "fecha"=>$_POST['date'],
                "organizador"=>$_POST['organice']
            );
   
            $resultado = TituloModel::registroTitulo($tabla,$datos);
            return $resultado;
        }
    }


    static public function listarTitulo(){

        $tabla = "titulos";

        $resultado = TituloModel::listarTitulo($tabla);
        return $resultado;
    }


    //cambio de estadog de minuta a guardado

    static public function guardar(){

        $idG =$_GET['id'];

        $tabla="titulos";

        $resultado=TituloModel::guardar($tabla,$idG);
        return $resultado;

    }
    
}


