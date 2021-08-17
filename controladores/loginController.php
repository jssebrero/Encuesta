<?php
require_once "modelos/loginModell.php";

class loginController{
    public function loginC(){

        if(isset($_POST['btnIngreso'])){
            if(empty($_POST['ingresoemail']) || empty($_POST['ingresopwd'])){
                if(!isset($_SESSION['error'])){
                    $_SESSION['error'] = null;
                }
                $_SESSION['error'] = 'Rellene todos los datos del formulario por favor';
            
            }
            else{
                $tabla = 'users';

                $datos = array(
                    'email'=> $_POST['ingresoemail'],
                    'password'=> $_POST['ingresopwd'],
                );

                $respuesta = new loginModel();
                $respuestaC  = $respuesta->loginM($tabla,$datos); 
                
                if($respuestaC == 1){#mostrar error al iniciar session
                    
                    if(!isset($_SESSION['error'])){
                        $_SESSION['error'] = null;
                    }
                    $_SESSION['error'] = 'Usuario y/o contraseña incorrectos';
                    echo '<script>
            if ( window.history.replaceState ) {
      
                window.history.replaceState( null, null, window.location.href );
      
              }
				window.location = "logIn";
				</script>';
                }
                elseif($respuestaC == 2){ #Mandar a la en cuesta
                    echo '<script>
            if ( window.history.replaceState ) {
      
                window.history.replaceState( null, null, window.location.href );
      
              }
				window.location = "index.php";
				</script>';
                    
                }
            }

            
        }
    }
}