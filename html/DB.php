

<?php
$servername = "165.22.14.77";
$username = "Nagu";
$password = "passwordNagu";
$dbname = "dbNagu";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
	//echo "Connection Successful."."<br>";



?>
