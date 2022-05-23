<?php
require_once('../controlador/controladorNovedad.php');
require_once('../controlador/controladorAmbiente.php');
require_once('../controlador/controladorTipoNovedad.php');
$idReporte = base64_decode($_REQUEST['idReporte']);
$idReporte = base64_decode($idReporte);
$novedad = $controladorNovedad->buscarNovedad($idReporte);
$controladorAmbiente = new controladorAmbiente();
$listarAmbiente = $controladorAmbiente->listarAmbiente();
$controladorTipoNovedad = new controladorTipoNovedad();
$listarTipoNovedad = $controladorTipoNovedad->listarTipoNovedad();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar novedad</title>
</head>
<body>
    <h1 align='center'>Modificar novedad</h1>
    <form action="../controlador/controladorNovedad.php" method="POST">
    <label># Reporte</label>
    <input type="text" name="idReporte" id="idReporte" readonly value="<?php echo $novedad->getidReporte(); ?>"/>
    <br><br>
    <label>Ambiente:</label>
    <select name="idAmbiente" id="idAmbiente">
    <option value="">Seleccione el ambiente</option>
        <?php
        foreach($listarAmbiente as $ambiente){
        ?>
        <option value="<?php echo $ambiente['idAmbiente'] ?>"
        <?php if($ambiente['idAmbiente'] == $novedad->getidAmbiente()){?> selected <?php } ?> >
        <?php echo $ambiente['idAmbiente'] ?>
        </option>
        <?php
            }
        ?>
    </select>
    <br><br>

    <label>Tipo de Novedad:</label>
    <select name="idTipoNovedad" id="idTipoNovedad">
    <option value="">Seleccione el tipo de novedad</option>
        <?php
        foreach($listarTipoNovedad as $tipoNovedad){
        ?>
        <option value="<?php echo $tipoNovedad['idTipoNovedad'] ?>"
        <?php if($tipoNovedad['idTipoNovedad'] == $novedad->getidTipoNovedad()){?> selected <?php } ?> >
            <?php echo $tipoNovedad['nombre'] ?>
        </option>
        <?php
            }
        ?>
    </select>
    <br><br>

    <label>Descripcion:</label>
    <br>
    <textarea name="descripcion" id="descripcion" value="<?php echo $novedad->getdescripcion(); ?>"></textarea>
    
    <br><br>

    <label>Fecha de registro</label>
    <input type="text" name="fechaRegistro" id="fechaRegistro" readonly value="<?php echo $novedad->getfechaRegistro(); ?>" />
    <br><br>
    <button type="submit" name="modificar">Modificar</button> 
    </form>
</body>
</html>