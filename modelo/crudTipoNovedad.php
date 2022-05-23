<?php
require_once('conexion.php');

class crudTipoNovedad{

    public function __construct(){
        
    }
    
    public function listarTipoNovedad(){
            $baseDatos = Conexion::conectar();
            $sql = $baseDatos->query('SELECT * FROM tiponovedad ORDER BY idTipoNovedad ASC');
            $sql->execute();
            Conexion::desconectar($baseDatos);
            return($sql->fetchAll());
        }

    public function registrarTipoNovedad($tipoNovedad){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('INSERT INTO
        tiponovedad(idTipoNovedad, nombre)
        VALUES(:idTipoNovedad, :nombre)');
        $sql->bindValue('idTipoNovedad', '');
        $sql->bindValue('nombre', $tipoNovedad->getnombre());
        
        try{
            $sql->execute();
            $mensaje = "Registro exitoso";
        }
        catch(Exception $e){
            $mensaje = $e->getMessage();
        }
        Conexion::desconectar($baseDatos);
        return $mensaje;
    }

    public function buscarTipoNovedad($tipoNovedad){
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query("SELECT * FROM tiponovedad
                WHERE idTipoNovedad=".$tipoNovedad->getidTipoNovedad());
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return $sql->fetch();
    }
    
    public function actualizarTipoNovedad($tipoNovedad){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('UPDATE tiponovedad
        SET 
        nombre = :nombre,
        WHERE idTipoNovedad=:idTipoNovedad');
        $sql->bindValue('idTipoNovedad', $tipoNovedad->getidTipoNovedad());
        $sql->bindValue('nombre', $tipoNovedad->getnombre());
        
        try{
            $sql->execute(); 
            $mensaje = "Actualización exitosa";
        }
        catch(Exception $e){
            $mensaje = $e->getMessage();
        }
        Conexion::desconectar($baseDatos);
        return $mensaje;
    }

    public function eliminarTipoNovedad($tipoNovedad){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('DELETE FROM tiponovedad
        WHERE idTipoNovedad=:idTipoNovedad');
        $sql->bindValue('idTipoNovedad', $tipoNovedad->getidTipoNovedad());

        try{
            $sql->execute();
            $mensaje = "Eliminación exitosa";
        }
        catch(Exception $e){
            $mensaje = $e->getMessage();
        }
        Conexion::desconectar($baseDatos);
        return $mensaje;
    }
}

?>