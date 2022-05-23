<?php
require_once('../modelo/tipoNovedad.php');
require_once('../modelo/crudTipoNovedad.php');
class controladorTipoNovedad{

    public function __construct(){
            
    }
    public function listarTipoNovedad(){
        $crudTipoNovedad = new crudTipoNovedad();
        return $crudTipoNovedad->listarTipoNovedad();
    }

    public function registrarTipoNovedad($nombre){
        $crudTipoNovedad = new  crudTipoNovedad();
        $tipoNovedad = new TipoNovedad();
        $tipoNovedad->setidTipoNovedad('');
        $tipoNovedad->setnombre($nombre);
        $mensaje = $crudTipoNovedad->registrarTipoNovedad($tipoNovedad);
        echo $mensaje;
    }

    public function buscarTipoNovedad($idTipoNovedad){
        $crudTipoNovedad = new  crudTipoNovedad();
        $tipoNovedad = new TipoNovedad();
        $tipoNovedad->setidTipoNovedad($idTipoNovedad);
        $datosTipoNovedad= $crudTipoNovedad->buscarTipoNovedad($idTipoNovedad);
        $tipoNovedad->setnombre($datosTipoNovedad['nombre']);
       
        return $tipoNovedad;
    }

    public function actualizarTipoNovedad($idTipoNovedad, $nombre){
        $crudTipoNovedad = new  crudTipoNovedad();
        $tipoNovedad = new TipoNovedad();
        $tipoNovedad->setidTipoNovedad($idTipoNovedad);
        $tipoNovedad->setnombre($nombre);
        $mensaje = $crudTipoNovedad->actualizarTipoNovedad($tipoNovedad);
        echo $mensaje;
    }

    public function eliminarTipoNovedad($idTipoNovedad){
        $crudTipoNovedad = new  crudTipoNovedad();
        $tipoNovedad = new TipoNovedad();
        $tipoNovedad->setidTipoNovedad($idTipoNovedad);
        $mensaje = $crudTipoNovedad->eliminarTipoNovedad($tipoNovedad);
        $mensaje = 'test';
        echo "<script>
        alert('$mensaje');
        document.location.href='../vista/listarTipoNovedad.php';
                </script>";
    }

    public function desplegarVista($pagina){
        header("location:../vista/".$pagina);
    }
}

$controladorTipoNovedad = new controladorTipoNovedad();

if (isset($_POST['registrar'])){
    $idTipoNovedad = $_POST['idTipoNovedad'];
    $nombre = $_POST['nombre'];
    $controladorTipoNovedad->registrarTipoNovedad($idTipoNovedad, $nombre);
}
else if(isset($_REQUEST['editar'])){
    $idTipoNovedad = base64_encode($_REQUEST['idTipoNovedad$idTipoNovedad']);
    $idTipoNovedad = base64_encode($idTipoNovedad);
    $controladorAmbiente->desplegarVista('editarTipoNovedad.php?idTipoNovedad='.$idTipoNovedad);
}
else if (isset($_POST['actualizar'])){
    $idTipoNovedad = $_POST['idTipoNovedad'];
    $nombre = $_POST['nombre'];
    $controladorTipoNovedad->actualizarTipoNovedad($idTipoNovedad,$nombre);
}
else if(isset($_GET['eliminar'])){

    $idAmbiente = $_REQUEST['idTipoNovedad'];
    $controladorTipoNovedad->eliminarTipoNovedad($idTipoNovedad);
    //$controladorCategoria->desplegarVista('listarCategoria.php');
}
else if(isset($_REQUEST['vista'])){
    $controladorTipoNovedad->desplegarVista('registrarTipoNovedad.php');
}

?>