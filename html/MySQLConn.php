
<?php  
$host = '165.22.14.77';  
$user = 'Nagu';  
$pass = 'passwordNagu';  
$dbname = 'dbNagu'; 
$con = mysqli_connect($host, $user, $pass, $dbname);  
if($con->connect_error){  
  die('Could not connect: '.$con->connect_error);  
}  
// echo 'Connected successfully<br/>';  
  
// $sql = 'SELECT * FROM Item';  
// $retval=mysqli_query($conn, $sql);  
  
// if(mysqli_num_rows($retval) > 0){
// echo "<table><tr><td>Item Id</td><td>Item Name</td><td>Unit Price</td></tr>";  
//  while($row = mysqli_fetch_assoc($retval)){  
//      echo "<tr><td>".$row["ItemId"]."</td><td>".$row["ItemName"]." ".$row["UnitPrice"]."</td></tr>";
//  } //end of while  
// }else{  
// echo "0 results";  
// // }  
?>  