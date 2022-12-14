<?php

require 'MySQLConn.php';
if(isset($_POST['input'])){
	$input = $_POST['input'];
	$query = "SELECT * FROM Item";
	$result = mysqli_query($con,$query);
	$SQL = mysqli_num_rows($result);
	if($SQL > 0){
		?>
   
   <thead>
						<tr>
							<th>Item Id</th>
							<th>Item Name</th>
							<th>Supplier ID</th>
							<th>Stock Qty</th>
							<th>Unit Price</th>
							<th>Action</th>

						</tr>
	</thead>
	<?php
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['ItemId'];
		$name = $row['ItemName'];
		$supplier = $row['SupplierId'];
		$stock = $row['StockQty'];
		$price = $row['UnitPrice'];
		?>
     
		<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $name; ?></td>
		<td><?php echo $supplier; ?></td>
		<td><?php echo $stock; ?></td>
		<td><?php echo $price; ?></td>
		<td>
                                            
        <button type="button" value="<?=$id ?>" class="editItemBtn btn btn-success btn-sm" data-bs-dismiss="modal">Edit</button>
        <button type="button" value="<?=$id?>" class="deleteItemBtn btn btn-danger btn-sm" data-bs-dismiss="modal">Delete</button>
        </td>
		</tr>
<?php
		}
	}
	else
	{
		echo "<h3 class = 'text-danger taxt-center mt-3' >Item not Found</h3>";
	}
}


if(isset($_POST['save_Item']))
{
	$ItemID = mysqli_real_escape_string($con, $_POST['ItemId']);
    $Description = mysqli_real_escape_string($con, $_POST['ItemName']);
    $Supplier = mysqli_real_escape_string($con, $_POST['Supplier']);
    $Stock = mysqli_real_escape_string($con, $_POST['Stock']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);



    $query = "INSERT INTO Item (ItemId,ItemName,SupplierId,StockQty,UnitPrice) VALUES ('$ItemID','$ItemName','$Supplier','$Stock','$Price')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Item Created Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Item Not Created'
        ];
        echo json_encode($res);
        return false;
    }
}


if(isset($_POST['update_Item']))
{
    $ItemID = mysqli_real_escape_string($con, $_POST['ItemId']);
    $Description = mysqli_real_escape_string($con, $_POST['ItemName']);
    $Supplier = mysqli_real_escape_string($con, $_POST['Supplier']);
    $Stock = mysqli_real_escape_string($con, $_POST['Stock']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);


    $query = "UPDATE Item SET ItemName='$ItemName', SupplierId='$Supplier', StockQty='$Stock', UnitPrice='$Price' 
                WHERE ItemID='$ItemID'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Item Updated Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Item Not Updated'
        ];
        echo json_encode($res);
        return false;
    }
}


if(isset($_GET['ItemId']))
{
    $ItemID = mysqli_real_escape_string($con, $_GET['ItemId']);
	

    $query = "SELECT * FROM Item WHERE ItemId='$ItemId'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $Item = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Item Fetch Successfully by ID',
            'data' => $Item
        ];
        echo json_encode($res);
        return false;
    }
}

if(isset($_POST['deleteItem']))
{
    $ItemID = mysqli_real_escape_string($conn, $_POST['ItemID']);

    $query = "DELETE FROM Item WHERE ItemId='$ItemId'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Item Deleted Successfully'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Item Not Deleted'
        ];
        echo json_encode($res);
        return false;
    }
}

?>