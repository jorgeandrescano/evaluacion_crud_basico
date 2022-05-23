<?php
require_once('conexion.php');

class crudAmbiente{

    public function __construct(){
        
    }
    
    public function listarAmbiente(){
            $baseDatos = Conexion::conectar();
            $sql = $baseDatos->query('SELECT * FROM ambiente ORDER BY idAmbiente ASC');
            $sql->execute();
            Conexion::desconectar($baseDatos);
            return($sql->fetchAll());
        }

    public function registrarAmbiente($ambiente){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('INSERT INTO
        ambiente(idAmbiente, descripcion, numeroComputadores)
        VALUES(:idAmbiente, :descripcion, :numeroComputadores)');
        $sql->bindValue('idAmbiente', $ambiente->getidAmbiente());
        $sql->bindValue('descripcion', $ambiente->getdescripcion());
        $sql->bindValue('numeroComputadores', $ambiente->getnumeroComputadores());
        
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

    public function buscarAmbiente($ambiente){
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query("SELECT * FROM ambiente
                WHERE idAmbiente=".$ambiente->getidAmbiente());
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return $sql->fetch();
    }
    
    public function actualizarAmbiente($ambiente){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('UPDATE ambiente
        SET 
        descripcion = :descripcion,
        numeroComputadores = :numeroComputadores,
        WHERE idAmbiente=:idAmbiente');
        $sql->bindValue('idAmbiente', $ambiente->getidAmbiente());
        $sql->bindValue('descripcion', $ambiente->getdescripcion());
        $sql->bindValue('numeroComputadores', $ambiente->getnumeroComputadores());
        
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

    public function eliminarAmbiente($ambiente){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('DELETE FROM ambiente
        WHERE idAmbiente=:idAmbiente');
        $sql->bindValue('idAmbiente', $ambiente->getidAmbiente());

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