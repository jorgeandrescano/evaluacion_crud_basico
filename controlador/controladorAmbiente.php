<?php
require_once('../modelo/ambiente.php');
require_once('../modelo/crudAmbiente.php');
class controladorAmbiente{

    public function __construct(){
            
    }
    public function listarAmbiente(){
        $crudAmbiente = new crudAmbiente();
        return $crudAmbiente->listarAmbiente();
    }

    public function registrarAmbiente($idAmbiente, $descripcion, $numeroComputadores){
        $crudAmbiente = new crudAmbiente();
        $ambiente = new Ambiente();
        $ambiente->setidAmbiente($idAmbiente);
        $ambiente->setdescripcion($descripcion);
        $ambiente->setnumeroComputadores($numeroComputadores);
        $mensaje = $crudAmbiente->registrarAmbiente($ambiente);
        echo $mensaje;
    }

    public function buscarAmbiente($idAmbiente){
        $crudAmbiente = new crudAmbiente();
        $ambiente= new Ambiente();
        $ambiente->setidAmbiente($idAmbiente);
        $datosAmbiente= $crudAmbiente->buscarAmbiente($ambiente);
        $ambiente->setdescripcion($datosAmbiente['descripcion']);
        $ambiente->setnumeroComputadores($datosAmbiente['numeroComputadores']);
        return $ambiente;
    }

    public function actualizarAmbiente($idAmbiente, $descripcion, $numeroComputadores){
        $crudAmbiente = new crudAmbiente();
        $ambiente = new Ambiente();
        $ambiente->setidAmbiente($idAmbiente);
        $ambiente->setdescripcion($descripcion);
        $ambiente->setnumeroComputadores($numeroComputadores);
        $mensaje = $crudAmbiente->actualizarAmbiente($ambiente);
        echo $mensaje;
    }

    public function eliminarAmbiente($idAmbiente){
        $crudAmbiente= new crudAmbiente();
        $ambiente = new Ambiente();
        $ambiente->setidAmbiente($idAmbiente);
        $mensaje = $crudAmbiente->eliminarAmbiente($ambiente);
        $mensaje = 'Se eliminó el ambiente';
        echo "<script>
        alert('$mensaje');
        document.location.href='../vista/listarAmbiente.php';
                </script>";
    }

    public function desplegarVista($pagina){
        header("location:../vista/".$pagina);
    }
}

$controladorAmbiente = new controladorAmbiente();

if (isset($_POST['registrar'])){
    $idAmbiente = $_POST['idAmbiente'];
    $descripcion = $_POST['descripcion'];
    if($_POST['numeroComputadores']>-1 && $_POST['numeroComputadores']<101){
        $numeroComputadores = $_POST['numeroComputadores'];
        $controladorAmbiente->registrarAmbiente($idAmbiente, $descripcion, $numeroComputadores);
    }
    else{
        echo "No se puede registrar, cantidad inválida de computadores";
        }
}

else if(isset($_REQUEST['editar'])){
    $idReporte = base64_encode($_REQUEST['idAmbiente']);
    $idReporte = base64_encode($idAmbiente);
    $controladorAmbiente->desplegarVista('editarAmbiente.php?idAmbiente='.$idAmbiente);
}
else if (isset($_POST['actualizar'])){
    $idAmbiente = $_POST['idAmbiente'];
    $descripcion = $_POST['descripcion'];
    $numeroComputadores = $_POST['numeroComputadores'];
    $controladorAmbiente->actualizarAmbiente($idAmbiente,$descripcion,$numeroComputadores);
}
else if(isset($_GET['eliminar'])){

    $idAmbiente = $_REQUEST['idAmbiente'];
    $controladorAmbiente->eliminarAmbiente($idAmbiente);
    $controladorAmbiente->desplegarVista('listarAmbiente.php');
}
else if(isset($_REQUEST['vista'])){
    $controladorAmbiente->desplegarVista('registrarAmbiente.php');
}

?>