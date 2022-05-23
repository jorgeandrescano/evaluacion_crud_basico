<?php
class Ambiente{
    private $idAmbiente;
    private $descripcion;
    private $numeroComputadores;

    public function __construct(){

    }

    public function setidAmbiente($idAmbiente){
        $this->idAmbiente = $idAmbiente;
    }

    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setnumeroComputadores($numeroComputadores){
        $this->numeroComputadores = $numeroComputadores;
    }

    public function getidAmbiente(){
        return $this->idAmbiente;
    }

    public function getdescripcion(){
        return $this->descripcion;
    } 
    
    public function getnumeroComputadores(){
        return $this->numeroComputadores;
    }       
}
?>