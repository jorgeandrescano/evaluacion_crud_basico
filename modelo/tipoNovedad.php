<?php
class TipoNovedad{
    private $idTipoNovedad;
    private $nombre;

    public function __construct(){

    }

    public function setidTipoNovedad($idTipoNovedad){
        $this->idTipoNovedad = $idTipoNovedad;
    }

    public function setnombre($nombre){
        $this->nombre = $nombre;
    }

    public function getidTipoNovedad(){
        return $this->idTipoNovedad;
    }

    public function getnombre(){
        return $this->nombre;
    } 
          
}
?>