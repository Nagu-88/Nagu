<?php
require 'MySQLConn.php';

if(isset($_POST["action"])){
  if($_POST["action"] == "insert"){
    insert();
  }
  else if($_POST["action"] == "edit"){
    edit();
  }
  else{
    delete();
  }
}

function insert(){
  global $conn;

  $ItemId = mysqli_real_escape_string($conn, $_POST['ItemId']);
    $ItemName = mysqli_real_escape_string($conn, $_POST['ItemName']);
    $Unitprice = mysqli_real_escape_string($conn, $_POST['UnitPrice']);
    $StockQty = mysqli_real_escape_string($conn, $_POST['StockQty']);
  $query = "INSERT INTO Item VALUES('$ItemID', '$ItemName', '$UnitPrice', '$StockQty')";
  mysqli_query($conn, $query);
  echo "Inserted Successfully";
}

function edit(){
  global $conn;

  $ItemId = $_POST["ItemId"];
  $ItemName = $_POST["ItemName"];
  $UnitPrice = $_POST["UnitPrice"];
  $StockQty = $_POST["StockQty"];

  $query = "UPDATE Item SET ItemName = '$ItemName', UnitPrice = '$UnitPrice', StockQty = '$StockQty' WHERE ItemId = $id";
  mysqli_query($conn, $query);
  echo "Updated Successfully";
}

function delete(){
  global $conn;

  $id = $_POST["action"];

  $query = "DELETE FROM Item WHERE ItemId = $id";
  mysqli_query($conn, $query);
  echo "Deleted Successfully";
}
?>