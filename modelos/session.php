<?php
	

	if(!isset($_SESSION['session']) || trim($_SESSION['session']) == ''){ 
	
    	header('location: index.php');
	}
    


	//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {
    $fechaGuardada = $_SESSION["tiempo"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
    if($tiempo_transcurrido >= 180) {
        //si pasaron 3 minutos o más
        session_unset();
        session_destroy(); // destruyo la sesión
        header("Location: index.php"); //envío al usuario a la pag. de autenticación
        //sino, actualizo la fecha de la sesión
    }else {
    $_SESSION["tiempo"] = $ahora;
    }

} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = date("Y-n-j H:i:s");
}