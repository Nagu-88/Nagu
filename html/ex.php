
<?php
$servername = "165.22.14.77";
$username = "Nagu";
$password = "passwordNagu";
$dbname = "dbNagu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "select * from Item";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
  
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    } 
echo "Connected successfully";
?>
<!DOCTYPE html>
<html>
<style>
    td,th {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
    }
</style>
  
<body>
    <table>
        <thead>
            <tr>
                <th>Item Id</th>
                <th>Item Name</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
               if(!empty($row))
               foreach($row as $rows)
              { 
            ?>
            <tr>
  
                <td><?php echo $rows['ItemId']; ?></td>
                <td><?php echo $rows['ItemName']; ?></td>
                <td><?php echo $rows['UnitPrice']; ?></td>
  
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
  
<?php   
    mysqli_close($conn);
?>