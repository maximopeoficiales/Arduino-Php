<?php
require_once("includes/UserSession.php");
require_once("controllers/RegistrosController.php");

$usuarios = new RegistrosController();
$userSession = new UserSession();

if (isset($_SESSION['user'])) {
	$datos = $usuarios->GetUserExist($_SESSION['user']);/* obtengo los datos con la variable de session */
	/* 	var_dump($datos);	 */
	include_once('ListaRegistros.php');
} elseif (isset($_POST['user']) && isset($_POST['pass'])) {
	//echo "Validacion de login";
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$datos = $usuarios->userExist($user, $pass);/* obtengo datos de la bd */

	if ($user = $datos[0]['username'] && $pass = $datos[0]['pass']) {
		/* ECHO "USUARIO CORRECTO"; */
		$userSession->setCurrentUser($datos[0]['username']);/* guardo el usuario en la session */

		include_once('ListaRegistros.php');
	} else {
		$errorLogin = "Usuario o Contraseña Incorrecta";
		include_once('login.php');
	}
} else {
	/* echo "login"; */
	include_once('login.php');
}
