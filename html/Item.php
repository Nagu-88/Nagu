<html>

<head>

<title>PHP MySQL connection example</title>

</head>

<body>

<form method="post">

Enter Item Id : <input type="text" name="ItemId"><br/>

<input type="submit" value="SELECT" name="Submit1"> <br/>

</form>

<?php

if(isset($_POST['Submit1']))

{ 

$username = "Nagu";

$password = "passwordNagu";

$hostname = "165.22.14.77"; 

$database="dbNagu";

//connection to the mysql database,

$connection = mysqli_connect($hostname, $username, $password,$database);
echo "connected successfully";

if(!empty($_POST["ItemId"]))

{

$result = mysqli_query($connection, "SELECT * FROM Item where ItemId=".$_POST["ItemId"] );

}

else

{ 

$result = mysqli_query($connection, "SELECT Item FROM Item" );

}

// fetch the data from the database 

while ($row = mysqli_fetch_array($result))
{

	echo "Inside database";
	echo "Item ID:" .$row{'ItemId'}." Item Name:".$row{'ItemName'}." Unit Price: ". $row{'UnitPrice'}."Stock Qty" .$row{'StockQty'}."<br>";

}

// close the connection

mysqli_close($connection);

}

?>

</body>

</html>