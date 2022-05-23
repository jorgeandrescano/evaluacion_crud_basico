<?php
require_once('../controlador/controladorAmbiente.php');
$controladorAmbiente = new controladorAmbiente();
$listarAmbiente = $controladorAmbiente->listarAmbiente();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ambiente</title>
</head>
<body>
    <h1 align='center'>Registrar Ambiente</h1>
    <form action="../controlador/controladorAmbiente.php" method="POST">
    <label>Ambiente:</label>
    <input type="text" name="idAmbiente" id="idAmbiente">
    <br><br>
    <p>Descripción:</p>
    <textarea name="descripcion" id="descripcion" rows="10" cols="50"></textarea>
    <br><br>
    <label>Número de computadores:</label>
    <input type="number" name="numeroComputadores" id="numeroComputadores">
    <br><br>
    <button type="submit" name="registrar" id="registrar">Registrar</button>
    </form>
</body>
</html>