<?php
   include("../vendor/autoload.php");
   $dsn = new MongoDB\Client;
   $ukGymDB = $dsn->ukGym;
   if(!$dsn){
      echo "error in connection!";
   }
   


?>