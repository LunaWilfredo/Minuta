<?php

require 'DB/db.php';

class TituloModel{

    static public function registroTitulo($tabla,$datos){
        $sql="INSERT INTO $tabla(nombre,fecha,organizador,estadog) VALUES (:nombre,:fecha,:organizador,2)";
        $conexion = Conexion::conectar()->prepare($sql);
        $conexion->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $conexion->bindParam(":fecha",$datos['fecha'],PDO::PARAM_STR);
        $conexion->bindParam(":organizador",$datos['organizador'],PDO::PARAM_STR);

        if($conexion->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $conexion->close();
        $conexion = NULL;
    }

    static public function listarTitulo($tabla){

        $sql ="SELECT t.*, p.nombre AS 'organizador' FROM $tabla t INNER JOIN personales p ON t.organizador = p.id";

        $conexion=Conexion::conectar()->prepare($sql);
        $conexion->execute();
        return $conexion->fetchAll();

        $conexion->close();
        $conexion = NULL;

    }

    //cambio de estado a guardar

    static public function guardar($tabla,$idG){
        
        $sql="UPDATE $tabla SET estadog = 1 WHERE id = $idG ";
        $conexion=Conexion::conectar()->prepare($sql);

        if($conexion->execute()){
            return "ok";
        }

        $conexion->close();
        $conexion = NULL;

    }
}