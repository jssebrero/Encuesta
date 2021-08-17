<?php
session_start();

include_once('vistas/header.php');

#Revisa si la session existe y esta iniciada
if(isset($_SESSION['session'])){
    require ('controladores/sessionController.php');
    require ('controladores/plantillaController.php');
    $session = new timeSession();#llamada a session para controlar el tiempo de inactividad
    $session->sessionC();
    $plantilla = new plantillaC();#llamada a la pagina principal de la vista
    $plantilla->plantilla();
    
    
}
else{
    if(isset($_GET['url'])){
        #Comprueba que exista la variable url para la redirección
        if($_GET['url']=="signUp" || $_GET['url']=="logIn"){
            include "vistas/pages/".$_GET['url'].".php";
        }
        else{
            #si la pagina no existe dara un error
            include "vistas/pages/error404.php";
        }
    }
    else{
        #llamada a la vista del login
        include_once('vistas/pages/logIn.php');
    }
    


}


