<?php

require 'MySQLConn.php';

if(isset($_POST['save_Item']))
{
    $ItemId = mysqli_real_escape_string($conn, $_POST['ItemId']);
    $ItemName = mysqli_real_escape_string($conn, $_POST['ItemName']);
    $Unitprice = mysqli_real_escape_string($conn, $_POST['UnitPrice']);
    $StockQty = mysqli_real_escape_string($conn, $_POST['StockQty']);

    if($ItemId == NULL || $ItemName == NULL || $UnitPrice == NULL || $StockQty == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO Item (ItemId,ItemName,UnitPrice,StockQty) VALUES ('$ItemId','$ItemName','$UnitPrice','$StockQty')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Item inserted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Item Not Inserted'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_Item']))
{
    $ItemId = mysqli_real_escape_string($conn, $_POST['ItemId']);

    $ItemName = mysqli_real_escape_string($conn, $_POST['ItemName']);
    $UnitPrice = mysqli_real_escape_string($conn, $_POST['UnitPrice']);
    $StockQty = mysqli_real_escape_string($conn, $_POST['StockQty']);

    if($ItemName == NULL || $UnitPrice == NULL || $StockQty == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE Item SET ItemName='$ItemName', UnitPrice='$UnitPrice', StockQty='$StockQty' 
                WHERE ItemId='$ItemId'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['ItemId']))
{
    $student_id = mysqli_real_escape_string($conn, $_GET['ItemId']);

    $query = "SELECT * FROM students WHERE ItemId='$ItemId'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $Item = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Item Fetch Successfully by id',
            'data' => $Item
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_Item']))
{
    $ItemId = mysqli_real_escape_string($conn, $_POST['ItemId']);

    $query = "DELETE FROM students WHERE ItemId='$ItemId'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
?>

