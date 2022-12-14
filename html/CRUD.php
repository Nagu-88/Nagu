<?php
header('Access-Control-Allow-Origin: *');
require 'DB.php';
        <button type="button" value="<?=$id ?>" class="editItemBtn btn btn-secondary btn-sm" data-bs-dismiss="modal">Edit</button>
        <button type="button" value="<?=$id?>" class="deleteItemBtn btn btn-secondary btn-sm" data-bs-dismiss="modal">Delete</button>
		}
	}
	else
	{
		echo "<h3 class = 'text-danger taxt-center mt-3' >Item not Found</h3>";
	}
}


if(isset($_POST['save_Item']))
{
	$ItemID = mysqli_real_escape_string($con, $_POST['ItemID']);
    $Description = mysqli_real_escape_string($con, $_POST['Description']);
    $Supplier = mysqli_real_escape_string($con, $_POST['Supplier']);
    $Stock = mysqli_real_escape_string($con, $_POST['Stock']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);



    $query = "INSERT INTO Item (ItemId,ItemName,SupplierId,StockQty,UnitPrice) VALUES ('$ItemID','$Description','$Supplier','$Stock','$Price')";
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
    $ItemID = mysqli_real_escape_string($con, $_POST['ItemID']);
    $Description = mysqli_real_escape_string($con, $_POST['Description']);
    $Supplier = mysqli_real_escape_string($con, $_POST['Supplier']);
    $Stock = mysqli_real_escape_string($con, $_POST['Stock']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);


    $query = "UPDATE Item SET ItemName='$Description', SupplierId='$Supplier', StockQty='$Stock', UnitPrice='$Price' 
                WHERE ItemId='$ItemID'";
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


if(isset($_GET['ItemID']))
{
    $ItemID = mysqli_real_escape_string($con, $_GET['ItemID']);
	

    $query = "SELECT * FROM Item WHERE ItemId='$ItemID'";
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
    $ItemID = mysqli_real_escape_string($con, $_POST['ItemID']);

    $query = "DELETE FROM Item WHERE ItemId='$ItemID'";
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