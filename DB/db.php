<?php

class Conexion{

    static public function conectar(){
        $link = New PDO("mysql:host=localhost;dbname=minute","root","");

        $link->exec("SET NAMES UTF8");

        return $link;
    }

}