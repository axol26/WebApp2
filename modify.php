<?php

    include "connect.php";
    
    if (isset($_GET['updateid'])){ //update value
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM employee where id='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $birthdate = $row["birthdate"];
        $tin = $row["tin"];
        $type = $row["type"];
    } else{ // create new log
        $name = "";
        $birthdate = "";
        $tin = "";
        $type = "";
    } 

    if(isset($_POST["submit"])){
        $name = $_POST["ename"];
        $birthdate = $_POST["birthdate"];
        $tin = $_POST["tin"];
        $etype = $_POST["etype"];

        if (empty($name) || empty($birthdate) || strlen($tin) !== 10 || empty($etype)) {
            echo '<script>alert("Date input error, please provide correct inputs.");</script>';
        } elseif (isset($_GET['updateid'])){ //update
            $sql = "UPDATE employee SET id='$id', name='$name', birthdate='$birthdate', tin='$tin', type='$etype' WHERE id='$id'";
            $result = mysqli_query($con,$sql);
            header("location:index.php");
        } else{ //new
            $sql = "INSERT INTO employee (name, birthdate, tin, type) VALUES ('$name', '$birthdate', '$tin', '$etype')";
            $result = mysqli_query($con,$sql);
            header("location:index.php");
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/trydb.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="container overlay">
      <h1 id="namey"></h1>
        <form name="frm_name" method="post">
            <fieldset>
                <legend><h1>Create Log</h1></legend>
                <a href="index.php"><button type="button" id="cl" class="btn btn-link">Return</button></a>
                <br>
                <br>
                <label>Name</label>
                <br>
                <input type="text" class="form-control" name="ename" value=<?php echo $name;?>>     
                <br> 
                <label>Birthdate</label>
                <br>
                <input type="date" class="form-control" name="birthdate" placeholder="yyyy-mm-dd" value=<?php echo $birthdate;?>>
                <br>
                <label>TIN</label>
                <br>
                <input type="number" class="form-control" name="tin" placeholder="numbers only" value=<?php echo $tin;?>>
                <br>
                <label>Employee Type</label>
                <br>
                <select name="etype">
                  <option disabled selected value="">Please Select...</option>
                  <option value="Regular" <?php if ($type == "Regular") echo 'selected'; ?>>Regular</option>
                  <option value="Contractual" <?php if ($type == "Contractual") echo 'selected'; ?>>Contractual</option>
                </select>
                <br>
                <button type="submit" id="insert" class="subs btn btn-link" name="submit">Submit</button>
                <br>
            </fieldset>
        </form>       
    </div>
  </body>
</html>