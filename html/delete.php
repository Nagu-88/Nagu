<?php

include_once("MySQLConn.php");

global $conn;

$id = $_POST["action"];

$query = "DELETE FROM Item WHERE ItemId = $id";
mysqli_query($conn, $query);
echo "Deleted Successfully";
?>