<?php

    $con=new mysqli("localhost","root","","testdb");
    if ($con){
        echo "Connection successful";
    } else{
        die(mysqli_error($con));
    } 


?>