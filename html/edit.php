<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
  </head>
  <body>
    <h2>Edit</h2>
    <form autocomplete="off" action="" method="post">
      <?php
      require 'MYSQLConn.php';
      $id = $_GET["ItemId"];
      $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Item WHERE ItemId = $id"));
      ?>
      <input type="hidden" id="ItemId" value="<?php echo $rows['ItemId']; ?>">
      <label for="">ItemName</label>
      <input type="text" id="ItemName" value="<?php echo $rows['ItemName']; ?>"> <br>
      <label for="">UnitPrice</label>
      <input type="text" id="UnitPrice" value="<?php echo $rows['UnitPrice']; ?>"> <br>
      <label for="">StockQty</label>
      <input type="text" id="StockQty" value="<?php echo $rows['StockQty']; ?>"> <br>
      <button type="button" onclick="edit();">Edit</button>
    </form>
    <?php
    if(isset($_POST["Edit"])){

    $ItemId = $_POST["ItemId"];
    $ItemName = $_POST["ItemName"];
    $UnitPrice = $_POST["UnitPrice"];
    $StockQty = $_POST["StockQty"];

    $query = "UPDATE Item SET ItemName = '$ItemName', UnitPrice = '$UnitPrice', StockQty = '$StockQty' WHERE ItemId = $ItemId";
    mysqli_query($conn, $query);
    echo "Updated Successfully";
	}
	?>

    <br>
    <?php require 'index1.php'; ?>
    <a href="index1.php">Go To Index</a>
  </body>
</html>