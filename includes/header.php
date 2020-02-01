<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b5b7f00aae.js" crossorigin="anonymous"></script>
    <!-- Font awesome -->

    <title>REGISTROS DE PUERTAS</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <!-- Nombre de tu app -->
        <a href="index.php" class="navbar-brand">Control de Puertas</a>
        <!-- necesario para que al presionarlo se muestre lo demas -->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#segundabarra">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- se le pone collapse para en cierto tamaño no este colapsado -->
        <div class="collapse navbar-collapse" id="segundabarra">
            <ul class="navbar-nav ml-auto">
              
                <li class="nav-item mr-2"><a href="PhpMailer/index.php" class="nav-link" target="s"><i class="fas fa-envelope-open-text mr-2"></i>Enviar Reporte</a></li>
                
                <li class="nav-item"><a href="includes/logout.php" class="nav-link btn btn-danger">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
    <!-- <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand">Control de Puertas</a>
        </div>
    </nav> -->
    <!-- <a href="includes/logout.php" class="btn btn-primary">Cerrar Sesion</a> -->