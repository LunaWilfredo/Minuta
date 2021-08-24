<?php

require_once 'Models/actividadModel.php';

class Actividad{

    static public function workerList(){
        $tabla ="personales";

        $resultado = ActividadModel::workersList($tabla);
        return $resultado;
    }

    static public function registroActividad(){

        if(isset($_POST['activity']) && $_POST['activity'] != null){

            $tabla = "actividades";
    
            $datos = array (
                "nombre"=>$_POST['activity'],
                "fechaf"=>$_POST['datef'],
                "descripcion"=>$_POST['description'],
                "responsable"=>$_POST['staff'],
                "titulo"=>$_POST['tid']
            );

            $resultado = ActividadModel::registroActividad($tabla,$datos);
            return $resultado;

        }
 
    }

    static public function listarActividades(){

        $tid = $_GET['id'];

        $tabla = "actividades";

        $resultado = ActividadModel::listarActividades($tabla,$tid);
        return $resultado;

    }

    static public function listarUno(){
        
        $bid=$_GET['id'];

        $tabla = "actividades";

        $resultado = ActividadModel::listarUno($tabla,$bid);
        return $resultado;

    }

    static public function update(){

        if(isset($_POST['activityU']) && $_POST['activityU'] != null){

            $idA=$_POST['idU'];
    
            $tabla = "actividades";
    
            $datos = array(
                "nombre"=>$_POST['activityU'],
                "fechaf"=>$_POST['datefU'],
                "descripcion"=>$_POST['descriptionU'],
                "responsable"=>$_POST['staffU']
            );
    
            $resultado = ActividadModel::update($tabla,$datos,$idA);
            return $resultado;
        }

    }


    //actualizacion de estado a realizado

    static public function realizado(){
        if(isset($_POST['btnr'])){

            $idA = $_POST['realizado'];
    
            $tabla = "actividades";
    
            $resultado = ActividadModel::realizado($tabla,$idA);
            return $resultado;
        }
    }


    //vista pdf minuta
    static public function listarPdf(){
        
        $bid=$_GET['id'];

        $tabla = "actividades";

        $resultado = ActividadModel::listarPdf($tabla,$bid);
        return $resultado;

    }


}