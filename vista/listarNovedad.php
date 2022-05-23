<?php
require_once('../controlador/controladorNovedad.php');
$controladorNovedad = new controladorNovedad();
$listarNovedad = $controladorNovedad->listarNovedad();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <title>Listar Novedad</title>
</head>
<body>
    <p align='center'>Lista de novedades</p>
    <a href="../controlador/controladorNovedad.php?vista=registrarNovedad.php">Registrar</a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th># Reporte</th>
                <th>Ambiente</th>
                <th>Tipo de novedad</th>
                <th>Descripcion</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($listarNovedad as $novedad){
                echo "<tr>";
                echo "<td>".$novedad['idReporte']."</td>";
                echo "<td>".$novedad['idAmbiente']."</td>";
                echo "<td>".$novedad['idTipoNovedad']."</td>";
                echo "<td>".$novedad['descripcion']."</td>";
                echo "<td>".$novedad['fechaRegistro']."</td>";
                echo "<td>
                <form method='POST' action='../controlador/controladorNovedad.php'>
                <input type='hidden' name='idReporte' value=".$novedad['idReporte']." />
                <button type='submit' name='editar'>Editar</button>
                </form>
                <a href='#' onclick='validarEliminacion($novedad[idReporte])'>Eliminar</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <script>
        function validarEliminacion(idReporte){
            let eliminar = " ";
            if(confirm('¿Está seguro de eliminar la novedad?')){
                document.location.href = "../controlador/controladorNovedad.php?idReporte="+idReporte+"&eliminar";
            }
        }
    </script>
    <script src="../assets/js/jquery-3.5.1.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
             } });
        } );
    </script>
</body>
</html>