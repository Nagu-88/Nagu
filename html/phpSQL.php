
<?php
$servername = "165.22.14.77";
$username = "Nagu";
$password = "passwordNagu";
$dbname = "dbNagu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "INSERT INTO Item (ItemId, ItemName, UnitPrice, StockQty)
VALUES ('1010','Watch','1500', '45')";
$execute = mysqli_query($conn, $query);
if($execute=== true){
  $msg= "Data was inserted successfully";
}else{
  $msg= mysqli_error($conn);
}

echo $msg;

}
?>
mysqli_close($conn);
?>



<?php
  $sql = 'select * from Item  ;';  
$retval=mysqli_query($conn, $sql); 
  
if(mysqli_num_rows($retval) > 0){
echo "<table><tr><td>Item Id</td><td>Item Name</td><td>Unit Price</td><td>StockQty</td></tr>";  
 while($row = mysqli_fetch_assoc($retval)){  
     echo "<tr><td>".$row["ItemId"]."</td><td>".$row["ItemName"]."</td><td>".$row["UnitPrice"]."</td><td>".$row["StockQty"]."</td><td>".$row["StockQty"]."</td></tr>";
 } //end of while  
 }else{  
 echo "0 results";  
 }  
?>