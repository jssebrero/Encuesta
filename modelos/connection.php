<?php

class conexion{

    #declarar los atributos
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        //asignacion de valores  para los atributos

        $this->host = "localhost";
        $this->db = "encuesta";
        $this ->user = "root";
        $this ->password = "12345";
        $this ->charset = "utf8";
    }

    //creacion de la conexion
    public function connect(){
        try{
            $connection = "mysql:host=".$this->host."; dbname=".$this->db."; charset=".$this->charset;
            
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false];
            
            $pdo = new PDO($connection,$this->user,$this->password,$options);
    
            return $pdo;
            
        }catch(PDOException $e){
            print_r("Error de conection: ".$e->getMessage());
        }
    }
    

}