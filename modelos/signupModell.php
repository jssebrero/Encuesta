<?php

require_once "connection.php";

class signupModel extends conexion{

    public function signupM($tabla,$datos){
        $stmt = $this->connect()->prepare("INSERT INTO $tabla (name, lastname, email, token, password, status) VALUES (:name, :lastname, :email, :token, :password, 0) ON DUPLICATE KEY UPDATE email = email;");
        
        $token = md5($datos['nombre']."&&".$datos['email']);

        $password = password_hash($datos['password'], PASSWORD_DEFAULT);

        
        $stmt->bindParam(":name",$datos['name'],PDO::PARAM_STR);
        $stmt->bindParam(":lastname",$datos['lastname'],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
        $stmt->bindParam(":token",$token,PDO::PARAM_STR);
        $stmt->bindParam(":password",$password,PDO::PARAM_STR);
        //$stmt->execute();
        if($stmt->execute()){
            $row = $stmt->rowCount();
            if($row < 1){
                return 2; 
            }
            else{
                return 1;
            }
            #return 1; 
            $row = null;
            $stmt = null;
            

        }
        
        
        
    }
}