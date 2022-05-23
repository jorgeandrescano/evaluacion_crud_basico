<?php
class Novedad{
   
    private $idReporte;
    private $idAmbiente;
    private $idTipoNovedad;
    private $descripcion;
    private $fechaRegistro;

    public function __construct(){

    }

    public function setidReporte($idReporte){
        $this->idReporte = $idReporte;
    }

    public function setidAmbiente($idAmbiente){
        $this->idAmbiente = $idAmbiente;
    }

    public function setidTipoNovedad($idTipoNovedad){
        $this->idTipoNovedad = $idTipoNovedad;
    }

    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setfechaRegistro($fechaRegistro){
        $this->fechaRegistro = $fechaRegistro;
    }
    
    public function getidReporte(){
        return $this->idReporte;
    }

    public function getidAmbiente(){
        return $this->idAmbiente;
    }

    public function getidTipoNovedad(){
        return $this->idTipoNovedad;
    }

    public function getdescripcion(){
        return $this->descripcion;
    }

    public function getfechaRegistro(){
        return $this->fechaRegistro;
    } 
    
}
?>