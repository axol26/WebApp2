<?php

    include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebApp</title>
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/trydb.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="container overlay">   
        <h1 id="namey"></h1>
        <form>
            <fieldset>
              <legend><h1>Employees</h1></legend>
              <a href="modify.php"><button type="button" id="cl" class="btn btn-link">Create Employee</button></a>
              <br>
              <br>
              <table class="table table-bordered table-hover" id="itemlist">
                <thead>
                    <tr>
                        <td>Full Name</td>
                        <td>Birthdate</td>
                        <td>TIN</td>
                        <td>Type</td>
                        <td>Action</td>
                    </tr>
                </thead>  
                <tbody>

                    <?php
                    
                        $sql="SELECT * from employee";
                        $result=mysqli_query($con,$sql);
                        if (mysqli_num_rows($result) == 0){
                            echo '<tr>
                                <td colspan="5" align="center">No Item Found</td>
                            </tr>';
                        } else {
                            while($row=mysqli_fetch_assoc($result)){
                                $id=$row['id'];
                                $name=$row['name'];
                                $birthdate=$row['birthdate'];        
                                $tin=$row['tin'];
                                $type=$row['type'];
                                echo '<tr>
                                    <td>'.$name.'</td>
                                    <td>'.$birthdate.'</td>
                                    <td>'.$tin.'</td>
                                    <td>'.$type.'</td>
                                    <td>
                                        <a href="delete.php?deleteid='.$id.'" class="btn btn-delete deleteitem">Delete</a> 
                                        <a href="calc.php?calcid='.$id.'" class="btn btn-calc calculateitem">Calculate</a> 
                                        <a href="modify.php?updateid='.$id.'" class="btn btn-update updateitem">Update</a>
                                    </td>
                                </tr>';
                            }
                        }
                    
                    ?>

                </tbody>
              </table>
          </fieldset>
        </form>  
    </div>
  </body>
</html>
