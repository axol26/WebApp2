<?php

    include "connect.php";
    if (isset($_GET["deleteid"])){
        $id = $_GET["deleteid"]; //get ID from URL
        $sql = "DELETE FROM employee WHERE id='$id'";
        $result = mysqli_query($con,$sql);
        if ($result){
            header("location:index.php");
        } else {
            die(mysqli_error($con));
        }
    }

?>