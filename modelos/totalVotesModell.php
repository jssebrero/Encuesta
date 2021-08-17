<?php
require_once('modelos/connection.php');

class totalVotesModell extends conexion{

    public function votesM($tabla,$vote){
    
        $stmt = $this->connect()->prepare("INSERT INTO $tabla (idLanguage, tokenUser) VALUES (:idLanguage, :tokenUser)");
        #$stmt = $this->connect()->prepare("INSERT INTO $tabla (idLanguage, tokenUser) VALUES (:idLanguage, 'd2e9e2b442991b163f03b02ea3b205ba')");

        $token = $_SESSION['user'];
        $stmt->bindParam(":idLanguage",$vote,PDO::PARAM_INT);
        $stmt->bindParam(":tokenUser",$token,PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        
    }

    public function statusVoteM($tabla){
    
        $stmt = $this->connect()->prepare("UPDATE users SET status = 1 WHERE token = :token");

        $token = $_SESSION['user'];
        $stmt->bindParam(":token",$token,PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        $_SESSION['userStatus'] = 1;
        
    }

    public function showResultsM($tabla1,$tabla2){
        #Consulta para ver el total de votos por lenguaje
        $stmt = $this->connect()->prepare("SELECT COUNT(t.idLanguage) as totalVotes,l.name FROM $tabla1 as t INNER JOIN $tabla2 as l ON t.idLanguage = l.id GROUP By t.idLanguage");
        
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;

        
        $stmt = null;
        $result = null;
    
    }

    public function getTotalVotesM($tabla){
        $stmt = $this->connect()->prepare("SELECT COUNT(*) AS total_Votes FROM totalVotes");

        $stmt->execute();

        /*$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();*/
        $result = $stmt->fetch();
        return $result;

        
        $stmt = null;
        $result = null;
    }
}