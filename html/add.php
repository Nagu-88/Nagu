<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		// include database connection file
		include_once("config.php");

		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");

		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
<html>
<head>
	<title>Add Users</title>
</head>

<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>

	<form action="insert.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Item Id</td>
				<td><input type="text" name="ItemId"></td>
			</tr>
			<tr>
				<td>Item Name</td>
				<td><input type="text" name="ItemName"></td>
			</tr>
			<tr>
				<td>Unit Price</td>
				<td><input type="text" name="UnitPrice"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>


</body>
</html>