<?php
require_once "modelos/signupModell.php";

class signupController{
    public function signupC(){
        if(isset($_POST['btnEnviar'])){

            if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['email']) || empty($_POST['pwd'])){
                
                    if(!isset($_SESSION['error'])){
                        $_SESSION['error'] = null;
                    }
                    $_SESSION['error'] = 'Rellene todos los datos del formulario por favor';
                
            }
            else{
                if(preg_match("/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/",$_POST['nombre'])
            &&
            preg_match("/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/",$_POST['apellidos'])
            &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])
            &&
            preg_match('/^[0-9a-zA-Z]+$/', $_POST["pwd"])
            ){
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
			    $email =  $_POST['email'];
			    $pwd = $_POST['pwd']; 

                $tabla = 'users';
                $datos = array(
                    'name' => $nombre,
                    'lastname' => $apellidos,
                    'email' => $email,
                    'password' => $pwd,
                );
                $respuesta = new signupModel();
                $respuestaC  = $respuesta->signupM($tabla,$datos); 
                
            
            }
            else{
                $respuestaC = 3;
                
            }

            
                if($respuestaC == 1){
                    if(!isset($_SESSION['success'])){
                        $_SESSION['success'] = null;
                    }
                    $_SESSION['success'] = 'Usuario creado correctamente';
                }
                elseif($respuestaC == 2){
                    if(!isset($_SESSION['error'])){
                        $_SESSION['error'] = null;
                    }
                    $_SESSION['error'] = 'Usuario no creado, email ya registrado';
                }
                elseif($respuestaC == 3){
                    if(!isset($_SESSION['error'])){
                        $_SESSION['error'] = null;
                    }
                    $_SESSION['error'] = 'valide datos del formulario por favor';
                }
                else{
                    if(!isset($_SESSION['error'])){
                        $_SESSION['error'] = null;
                    }
                    $_SESSION['error'] = 'error inesperado';
                }
            }

            
            
            
            

            echo '<script>
            if ( window.history.replaceState ) {
      
                window.history.replaceState( null, null, window.location.href );
      
              }
				window.location = "logIn";
				</script>';

        }
    }
}