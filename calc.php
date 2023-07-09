<?php

    include "connect.php";
    $id = $_GET['calcid'];
    $sql = "SELECT * FROM employee where id='$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $type = $row["type"];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regular Salary</title>
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/jquery.js"></script>
  </head>
  <body>
    <div class="container overlay">
      <h1 id="namey"></h1>
        <form>
          <fieldset>
            <legend><h1>Compute <?php echo $type;?> Salary for <?php echo $name;?></h1></legend>
            <a href="index.php"><button type="button" id="cl" class="btn btn-link">Return</button></a>
            <br>
            <br>
            <label>Days <?php 
                if ($type == "Regular"){
                    echo "Absent";
                } else {
                    echo "Worked";
                }
            ?></label>
            <br>
            <input type="number" class="form-control" id="days" step="0.01">
            <br>
            <input type="button" value="Calculate Salary" id=<?php echo $type;?> class="compute full btn btn-comp">
            <br>
            <h2 id="appi"></h2>
          </fieldset>
        </form>
    </div>
    <script src="js/calc.js" type="text/javascript"></script>
  </body>
</html>