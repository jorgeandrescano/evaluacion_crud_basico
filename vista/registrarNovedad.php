<?php
require_once('../controlador/controladorNovedad.php');
require_once('../controlador/controladorAmbiente.php');
require_once('../controlador/controladorTipoNovedad.php');
$controladorNovedad = new controladorNovedad();
$listarNovedad = $controladorNovedad->listarNovedad();
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
    <title>Registrar novedad</title>
</head>
<body>
    <h1 align='center'>Registrar novedad</h1>
    <form action="../controlador/controladorNovedad.php" method="POST">
    <label>Ambiente:</label>
    <select name="idAmbiente" id="idAmbiente">
    <option value="">Seleccione el ambiente</option>
        <?php
        foreach($listarAmbiente as $ambiente){
        ?>
        <option value="<?php echo $ambiente['idAmbiente'] ?>">
            <?php echo $ambiente['idAmbiente'] ?>
        </option>
        <?php
            }
        ?>
    </select>
    <br><br>
    <label>Tipo de novedad</label>
    <select name="idTipoNovedad" id="idTipoNovedad">
        <option value="">Seleccione el tipo de novedad</option>
        <?php
        foreach($listarTipoNovedad as $tipoNovedad){
        ?>
        <option value="<?php echo $tipoNovedad['idTipoNovedad'] ?>">
            <?php echo $tipoNovedad['nombre'] ?>
        </option>
        <?php
            }
        ?>
    </select>
    <br><br>
    <p>Descripción:</p>
    <textarea name="descripcion" rows="10" cols="50"></textarea>
    <br><br>

    <label>Fecha de registro</label>
    <!-- <input type="datetime-local" name="fechaRegistro" id="fechaRegistro"/> -->
    <input type="datetime" name="fechaRegistro" id="fechaRegistro"  value="<?php echo date("Y-m-d\TH-i-s");?>"> 
    <br><br>

    <button type="submit" name="registrar" id="registrar">Registrar</button>
    </form>
</body>
</html>