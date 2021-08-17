<div class="opcion">
    <?php
        $widthBar = $porcentaje * 5;
        $estilo = "barra";

        if($votesSurvey->getOptionSelected() == $lenguaje['opcion']){
            $estilo = "seleccionado";
        }

        echo $lenguaje['name'];
    ?>
    <div class="<?php echo $estilo; ?>" style="width: <?php echo $widthBar . 'px;' ?>"><?php echo $porcentaje . '%';  ?></div>

</div>