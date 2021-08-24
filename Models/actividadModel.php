<?php

require_once 'DB/db.php';

class ActividadModel{

    public static function workersList($tabla){
        $sql ="SELECT * FROM $tabla";
        $conexion = Conexion::conectar()->prepare($sql);
        $conexion->execute();
        return $conexion->fetchAll();

        $conexion->close();
        $conexion=NULL;
    }
    
    static public function registroActividad($tabla,$datos){
        
        $sql="INSERT INTO $tabla(nombre,fechai,fechaf,descripcion,estado,fk_organizador,fk_titulo) VALUES (:nombre,CURDATE(),:fechaf,:descripcion,'pendiente',:responsable,:titulo)";
        $conexion = Conexion::conectar()->prepare($sql);

        $conexion->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $conexion->bindParam(":fechaf",$datos['fechaf'],PDO::PARAM_STR);
        $conexion->bindParam(":descripcion",$datos['descripcion'],PDO::PARAM_STR);
        $conexion->bindParam(":responsable",$datos['responsable'],PDO::PARAM_STR);
        $conexion->bindParam(":titulo",$datos['titulo'],PDO::PARAM_STR);


        if($conexion->execute()){
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $conexion->close();
        $conexion=NULL;
    }

    static public function listarActividades($tabla,$tid){
        $sql="SELECT a.* , t.nombre as 'titulo', p.nombre as 'responsable'  FROM $tabla a INNER JOIN titulos t ON a.fk_titulo = t.id INNER JOIN personales p ON a.fk_organizador = p.id  WHERE a.fk_titulo = $tid";
        $conexion = Conexion::conectar()->prepare($sql);
        $conexion->execute();
        return $conexion->fetchAll();

        $conexion->close();
        $conexion=NULL;
    }

    static public function listarUno($tabla,$bid){
        $sql = "SELECT a.*, p.nombre as 'organizador', t.nombre as 'titulo' ,t.fecha as 'fecha' FROM $tabla a INNER JOIN personales p ON a.fk_organizador = p.id INNER JOIN titulos t ON a.fk_titulo = t.id  WHERE a.id = $bid";
        $conexion = Conexion::conectar()->prepare($sql);
        $conexion->execute();
        return $conexion->fetchAll();

        $conexion->close();
        $conexion=NULL;
    }

    static public function update($tabla,$datos,$idA){
        $sql = "UPDATE $tabla SET nombre = :nombre,fechaf=:fechaf,descripcion =:descripcion , fk_organizador=:responsable WHERE id = $idA";
        $conexion=Conexion::conectar()->prepare($sql);

        $conexion->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
        $conexion->bindParam(":fechaf",$datos['fechaf'],PDO::PARAM_STR);
        $conexion->bindParam(":descripcion",$datos['descripcion'],PDO::PARAM_STR);
        $conexion->bindParam(":responsable",$datos['responsable'],PDO::PARAM_INT);

        if($conexion->execute()){
            return "ok";
        }

        $conexion->close();
        $conexion=NULL;
    }


    ///cambio de estado a realizado

    static public function realizado($tabla,$idA){
        $sql="UPDATE $tabla SET estado = 'realizado' WHERE id=$idA";
        $conexion=Conexion::conectar()->prepare($sql);

        if($conexion->execute()){
            return "ok";
        }
        $conexion->close();
        $conexion=NULL;
    }

    //vista pdf
    static public function listarPdf($tabla,$bid){
        $sql = "SELECT a.*, p.nombre as 'organizador' ,t.nombre as 'titulo' FROM $tabla a INNER JOIN personales p ON a.fk_organizador = p.id INNER JOIN titulos t ON a.fk_titulo = t.id WHERE a.fk_titulo = $bid";
        $conexion = Conexion::conectar()->prepare($sql);
        $conexion->execute();
        return $conexion->fetchAll();

        $conexion->close();
        $conexion=NULL;
    }
    
}