<?php 

    define('DEBUG',true);

    function special_echo($val){
      if(DEBUG){
        echo $val;
        echo '<br>';
      }
    }



    function special_var_dump($val){
      if(DEBUG){
        echo '<pre>';
        var_dump($val);
        echo '</pre>';
      }
    }

    

 ?>