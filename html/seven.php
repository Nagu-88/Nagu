<?php

require 'S.php';
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM Item";
    $result = mysqli_query($con,$query);
    $SQL = mysqli_num_rows($result);
    if($SQL > 0){
        ?>
   
   <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Unit Price</th>
                            <th>Stock Quantity</th>
                            <th>Supplier ID</th>
                            <th>Action</th>

                        </tr>
    </thead>
    <?php
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['Item_ID'];
        $name = $row['Item_Name'];
        $price = $row['Unit_Price'];
        $stock = $row['Stock_Quantity'];
        $supplier = $row['Supplier_ID'];
        ?>
     
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $price; ?></td>
        <td><?php echo $stock; ?></td>
        <td><?php echo $supplier; ?></td>
        <td>
                                            
        <button type="button" value="<?=$id ?>" class="editItemBtn btn" data-bs-dismiss="modal">Edit</button>
        <button type="button" value="<?=$id?>" class="deleteItemBtn btn" data-bs-dismiss="modal">Delete</button>
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
    $ItemID = mysqli_real_escape_string($con, $_POST['ItemID']);
    $ItemName = mysqli_real_escape_string($con, $_POST['ItemName']);
    $Supplier = mysqli_real_escape_string($con, $_POST['Supplier']);
    $Stock = mysqli_real_escape_string($con, $_POST['Stock']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);



    $query = "INSERT INTO Item (Item_ID,Item_Name,Unit_Price,Stock_Quantity,Supplier_ID) VALUES ('$ItemID','$ItemName','$Price','$Stock','$Supplier')";
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
    $ItemName = mysqli_real_escape_string($con, $_POST['ItemName']);
    $Supplier = mysqli_real_escape_string($con, $_POST['Supplier']);
    $Stock = mysqli_real_escape_string($con, $_POST['Stock']);
    $Price = mysqli_real_escape_string($con, $_POST['Price']);


    $query = "UPDATE Item SET Item_Name='$ItemName', Unit_Price='$Price', Stock_Quantity='$Stock', Supplier_ID='$Supplier'  
                WHERE Item_ID='$ItemID'";
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
    

    $query = "SELECT * FROM Item WHERE Item_ID='$ItemID'";
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

    $query = "DELETE FROM Item WHERE Item_ID='$ItemID'";
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