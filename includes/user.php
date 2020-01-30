<?php
require_once("./controllers/RegistrosController.php");
$usuarios = new RegistrosController();

        $datosUsuario= $usuarios->GetUserExist($user);

