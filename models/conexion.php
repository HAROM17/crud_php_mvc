<?php

class Conexion{

    public static function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=crud_mvc","root","");
        return $link;

    }

}