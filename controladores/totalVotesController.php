<?php
require_once('modelos/totalVotesModell.php');
class totalVotesController{

    private $totalVotes;
    private $optionSelected;

    public function setOptionSelected($option){
        $this->optionSelected = $option;
    }

    public function getOptionSelected(){
        return $this->optionSelected;
    }


    public function vote(){
        $respuesta = new totalVotesModell();

        $tabla = 'totalVotes';
        $respuesta->votesM($tabla,$this->optionSelected);
        
    }

    public function statusVote(){
        $respuesta = new totalVotesModell();

        $tabla = 'user';
        $respuesta->statusVoteM($tabla);
        
    }

    public function showResults(){
        $respuesta = new totalVotesModell();

        $tabla1 = 'totalVotes';
        $tabla2 = 'language';
        $respuestaC = $respuesta->showResultsM($tabla1,$tabla2);
        return $respuestaC;
    }

    public function getTotalVotes(){
        $respuesta = new totalVotesModell();

        $tabla = 'totalVotes';
        $this->totalVotes = $respuesta->getTotalVotesM($tabla);
        return $this->totalVotes;

    }

    public function getPercentageVotes($votes){
        return round(($votes / $this->totalVotes['total_Votes']) * 100,0);
    }
}