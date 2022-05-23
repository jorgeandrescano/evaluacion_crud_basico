<?php
require_once('../modelo/novedad.php');
require_once('../modelo/crudNovedad.php');
class controladorNovedad{

    public function __construct(){
            
    }
    public function listarNovedad(){
        $crudNovedad = new crudNovedad();
        return $crudNovedad->listarNovedad();
    }

    public function registrarNovedad($idAmbiente, $idTipoNovedad, $descripcion, $fechaRegistro){
        $crudNovedad = new crudNovedad();
        $novedad = new Novedad();
        $novedad->setidReporte('');
        $novedad->setidAmbiente($idAmbiente);
        $novedad->setidTipoNovedad($idTipoNovedad);
        $novedad->setdescripcion($descripcion);
        $novedad->setfechaRegistro($fechaRegistro);
        $mensaje = $crudNovedad->registrarNovedad($novedad);
        echo $mensaje;
    }

    public function buscarNovedad($idReporte){
        $crudNovedad = new crudNovedad();
        $novedad= new Novedad();
        $novedad->setidReporte($idReporte);
        $datosNovedad = $crudNovedad->buscarNovedad($novedad);
        $novedad->setidAmbiente($datosNovedad['idAmbiente']);
        $novedad->setidTipoNovedad($datosNovedad['idTipoNovedad']);
        $novedad->setdescripcion($datosNovedad['descripcion']);
        $novedad->setfechaRegistro($datosNovedad['fechaRegistro']);
        return $novedad;
    }

    public function actualizarNovedad($idReporte,$idAmbiente, $idTipoNovedad, $descripcion, $fechaRegistro){
        $crudNovedad = new crudNovedad();
        $novedad = new Novedad();
        $novedad->setidReporte($idReporte);
        $novedad->setidAmbiente($idAmbiente);
        $novedad->setidTipoNovedad($idTipoNovedad);
        $novedad->setdescripcion($descripcion);
        $novedad->setfechaRegistro($fechaRegistro);
        $mensaje = $crudNovedad->actualizarNovedad($novedad);
        echo $mensaje;
    }

    public function eliminarNovedad($idReporte){
        $crudNovedad = new crudNovedad();
        $Novedad = new Novedad();
        $Novedad->setidReporte($idReporte);
        $mensaje = $crudNovedad->eliminarNovedad($Novedad);
        $mensaje = 'Novedad eliminada';
        echo "<script>
        alert('$mensaje');
        document.location.href='../vista/listarNovedad.php';
                </script>";
    }

    public function desplegarVista($pagina){
        header("location:../vista/".$pagina);
    }
}

$controladorNovedad = new controladorNovedad();

if (isset($_POST['registrar'])){
    $idAmbiente = $_POST['idAmbiente'];
    $idTipoNovedad = $_POST['idTipoNovedad'];
    $descripcion = $_POST['descripcion'];
    $fechaRegistro = $_POST['fechaRegistro'];
    $controladorNovedad->registrarNovedad($idAmbiente, $idTipoNovedad, $descripcion, $fechaRegistro);
}
else if(isset($_REQUEST['editar'])){
    $idReporte = base64_encode($_REQUEST['idReporte']);
    $idReporte = base64_encode($idReporte);
    $controladorNovedad->desplegarVista('editarNovedad.php?idReporte='.$idReporte);
}
else if (isset($_POST['modificar'])){ 
    $idReporte = $_POST['idReporte'];
    $idAmbiente = $_POST['idAmbiente'];
    $idTipoNovedad = $_POST['idTipoNovedad'];
    $descripcion = $_POST['descripcion'];
    $fechaRegistro = $_POST['fechaRegistro'];
    $controladorNovedad->actualizarNovedad($idReporte,$idAmbiente, $idTipoNovedad, $descripcion, $fechaRegistro);
}
else if(isset($_GET['eliminar'])){
    $idReporte = $_REQUEST['idReporte'];
    $controladorNovedad->eliminarNovedad($idReporte);
    //$controladorCategoria->desplegarVista('listarCategoria.php');
}
else if(isset($_REQUEST['vista'])){
    $controladorNovedad->desplegarVista('registrarNovedad.php');
}
    
?>