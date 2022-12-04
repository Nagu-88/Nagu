

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add</title>
  </head>
  <body>
    <h2>Add User</h2>
    <form autocomplete="off" action="" method="post">
      <label for="">ItemId</label>
      <input type="text" id="ItemId" value=""> <br>
      <label for="">ItemName</label>
      <input type="text" id="ItemName" value=""> <br>
      <label for="">UnitPrice</label>
      <input type="text" id="UnitPrice" value=""> <br>
      <label for="">StockQty</label>
      <input type="text" id="StockQty" value=""> <br>
      
      <input type="submit" value="submit" onclick="insert();">
          </form>
<?php 

include "MySQLConn.php";
String id = request.getParameter("id");
if(isset($_POST["submit"])){
  global $conn;
	 $ItemId = mysqli_real_escape_string($conn, $_POST['ItemId']);
    $ItemName = mysqli_real_escape_string($conn, $_POST['ItemName']);
    $Unitprice = mysqli_real_escape_string($conn, $_POST['UnitPrice']);
    $StockQty = mysqli_real_escape_string($conn, $_POST['StockQty']);
  $query = "INSERT INTO Item VALUES('$ItemID', '$ItemName', '$UnitPrice', '$StockQty')";
  mysqli_query($conn, $query);
  echo "Inserted Successfully";

  }
?>
  
    <br>
    <a href="index1.php">Go To Index</a>
    <?php require 'index1.php'; ?>
  </body>
</html>