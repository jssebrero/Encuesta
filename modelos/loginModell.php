<?php

require_once "connection.php";

class loginModel extends conexion{
    public function loginM($tabla,$datos){
        
        $email = $datos['email'];
        $stmt = $this->connect()->prepare("SELECT email,password,token,status FROM $tabla WHERE email = :email");
        $stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
        
        $stmt->execute();
        $result = $stmt->fetch();
        
        if(empty($result)){
            return 1;//Contraseña o usuario no encontrado
        }
        else{
            if(password_verify($datos['password'],  $result['password'])){
                $_SESSION['session'] = 'usuario';
                $_SESSION['user'] = $result['token'];
                $_SESSION['userStatus'] = $result['status'];
                return 2;//correcto
            }
            else{
                return 1;// Contraseña o usuario no encontrado
            }
        }
        $stmt = null;
        
        
        

        
    }
}