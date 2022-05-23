<?php

class Conexion{
    private static $conexion = NULL;
    private $host = '127.0.0.1';
    private $baseDatos = 'crud_evaluacion';
    private $usuario = 'root';
    private $contrasena = '';


    private function __construct(){}

    public static function conectar(){
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$conexion = new PDO('mysql:host=localhost;dbname=crud_evaluacion','root','',$pdo_options);
        return self::$conexion;
    }

    static function desconectar(&$conexion){
        $conexion = null;
    }   
}
$baseDatos = Conexion::conectar(); 

?>