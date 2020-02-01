<?php
/* include("includes/db.php"); */
include("includes/header.php");
require_once("controllers/RegistrosController.php");

$registros_controller = new RegistrosController();
$registros = $registros_controller->get();

$template = '
<h1 class="text-center">Bienvenido ' . $datos[0]['nombre'] . '</h1>
';
print($template);
$mes =  "a";
$ano = "a";
if (isset($_POST['fecha'])) {

    $fecha = $_POST['fecha'];
    $mes = substr($fecha, -2);
    $ano = substr($fecha, 0, -3);
    $registros_controller = new RegistrosController();
    $registros = $registros_controller->GetFechaPorMes($mes, $ano);
}
?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <form action="" method="POST" class="form-row mb-4">

                <label for="fecha">Filtro Por Fecha:</label>
                <input type="month" name="fecha" id="fecha" class="form-control" value="2020-01">
                <button class="btn btn-success mx-auto mt-2 btn-lg" type="submit">
                    Filtrar
                </button>
            </form>
        </div>
        <!--  -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chid_ID</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $i) { ?>
                        <tr>
                            <td><?php echo $i['id'] ?></td>
                            <td><?php echo $i['chipId'] ?></td>
                            <td><?php echo $i['fecha'] ?></td>
                            <td><?php echo $i['accion'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php

    $boton = '
    <a href="MPDF/app/index.php?ano=' . $ano . '&mes=' . $mes . '" class="btn btn-primary float-right" target="s"><i class="fas fa-print mr-1"></i>Imprimir</a>
    <br><br>';
    print($boton);
    ?>
    
</div>

<?php include("includes/footer.php") ?>