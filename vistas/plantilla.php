<?php

require_once('controladores/votacionController.php');
require_once('controladores/totalVotesController.php');
require_once('controladores/headerController.php');

#llamada a la cabecera
$header = new headerC();
$header -> header();

?>
<body>
<form  method="POST">
        <?php
        
            $votesSurvey = new totalVotesController();
            if($_SESSION['userStatus']){
                $showResults = true;
            }
            else{
                $showResults = false;
            }
            
            
            if(isset($_POST['lenguaje'])){
                $showResults = true;
                $votesSurvey->setOptionSelected($_POST['lenguaje']);
                $votesSurvey->vote();
                $votesSurvey->statusVote();
            }

        ?>
        <h2>¿Cuál es tu lenguaje de programación favorito?</h2>
        <?php
       
            if($showResults){
                
                

                $lenguajes = $votesSurvey->showResults();
                $totalVotes = $votesSurvey->getTotalVotes();

                echo '<h2>' . $totalVotes['total_Votes']. ' votos totales</h2>';

                foreach($lenguajes as $lenguaje){
                    $porcentaje = $votesSurvey->getPercentageVotes($lenguaje['totalVotes']);
                    
                    include 'vistas/pages/results.php';
                    
                }
                #Mensaje de gracias en caso de que el usuario halla respondido la encuesta
                if(isset($_SESSION['userStatus'])){
                    echo "
                        <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times </button>
                        GRACIAS POR PARTICIPAR EN LA ENCUESTA
                        </div>
                    ";
                }

                echo '<script>
      
              if ( window.history.replaceState ) {
      
                window.history.replaceState( null, null, window.location.href );
                
              }
              
      
            </script>';
            
            }
            else{
                $OptionVotes = new votosModelo();
                $OptionVotes-> votos();
            }
            
        ?>

    </form>
</body>
</html>