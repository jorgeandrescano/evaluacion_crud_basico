<?php
require_once('conexion.php');

class crudNovedad{

    public function __construct(){
        
    }
    
    public function listarNovedad(){
            $baseDatos = Conexion::conectar();
            $sql = $baseDatos->query('SELECT * FROM novedad ORDER BY idReporte ASC');
            $sql->execute();
            Conexion::desconectar($baseDatos);
            return($sql->fetchAll());
        }

    public function registrarNovedad($novedad){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('INSERT INTO
        novedad(idReporte, idAmbiente, idTipoNovedad, descripcion, fechaRegistro)
        VALUES(:idReporte, :idAmbiente, :idTipoNovedad, :descripcion, :fechaRegistro)');
        $sql->bindValue('idReporte', '');
        $sql->bindValue('idAmbiente', $novedad->getidAmbiente());
        $sql->bindValue('idTipoNovedad', $novedad->getidTipoNovedad());
        $sql->bindValue('descripcion', $novedad->getdescripcion());
        $sql->bindValue('fechaRegistro', $novedad->getfechaRegistro());
        

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

    public function buscarNovedad($novedad){
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query("SELECT * FROM novedad
                WHERE idReporte=".$novedad->getidReporte());
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return $sql->fetch();
    }
    
    public function actualizarNovedad($novedad){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('UPDATE novedad
        SET 
        idAmbiente = :idAmbiente,
        idTipoNovedad = :idTipoNovedad,
        descripcion = :descripcion,
        fechaRegistro = :fechaRegistro
        WHERE idReporte=:idReporte');
        $sql->bindValue('idReporte', $novedad->getidReporte());
        $sql->bindValue('idAmbiente', $novedad->getidAmbiente());
        $sql->bindValue('idTipoNovedad', $novedad->getidTipoNovedad());
        $sql->bindValue('descripcion', $novedad->getdescripcion());
        $sql->bindValue('fechaRegistro', $novedad->getfechaRegistro());
        

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

    public function eliminarNovedad($novedad){
        $mensaje = "";
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('DELETE FROM novedad
        WHERE idReporte=:idReporte');
        $sql->bindValue('idReporte', $novedad->getidReporte());

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