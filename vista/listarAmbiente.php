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
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
    <title>Listar Ambiente</title>
</head>
<body>
    <a href="../controlador/controladorAmbiente.php?vista=registrarAmbiente.php">Registrar</a>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Ambiente</th>
                <th>Descripcion</th>
                <th># Computadores </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($listarAmbiente as $ambiente){
                echo "<tr>";
                echo "<td>".$ambiente['idAmbiente']."</td>";
                echo "<td>".$ambiente['descripcion']."</td>";
                echo "<td>".$ambiente['numeroComputadores']."</td>";
                echo "<td>
               <form method='POST' action='../controlador/controladorAmbiente.php'>
                <input type='hidden' name='idAmbiente' value=".$ambiente['idAmbiente']." />
                <button type='submit' name='editar'>Editar</button>
                </form>
                <a href='#' onclick='validarEliminacion($ambiente[idAmbiente])'>Eliminar</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <script>
        function validarEliminacion(idAmbiente){
            let eliminar = " ";
            if(confirm('¿Está seguro de eliminar el ambiente?')){
                document.location.href = "../controlador/controladorAmbiente.php?idAmbiente="+idAmbiente+"&eliminar";
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