<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
<script>
    function insert(){
    $(document).ready(function()
    {

        var data = {
        action: action,
        ItemId: $("#ItemId").val(),
        ItemName: $("#ItemName").val(),
        UnitPrice: $("#UnitPrice").val(),
        StockQty: $("#StockQty").val(),
      };

        $.ajax({
            type: "POST",
            url: "insert.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                
                var res = jQuery.parseJSON(response);
            }
        });

    function edit(){
    $(document).ready(function()
    {
        var data = {
        action: action,
        ItemId: $("#ItemId").val(),
        ItemName: $("#ItemName").val(),
        UnitPrice: $("#UnitPrice").val(),
        StockQty: $("#StockQty").val(),
      };

        $.ajax({
            type: "POST",
            url: "edit.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                
                var res = jQuery.parseJSON(response);
            }
        });

    function delete(){
    $(document).ready(function() 
    {
        var data = {
        action: action,
        ItemId: $("#ItemId").val(),
        ItemName: $("#ItemName").val(),
        UnitPrice: $("#UnitPrice").val(),
        StockQty: $("#StockQty").val(),
      };

        $.ajax({
            type: "POST",
            url: "delete.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                
                var res = jQuery.parseJSON(response);
            }
        });


</script>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <h2>Index</h2>
    <table border = 1>
      <tr>
        <td>ItemId</td>
        <td>ItemName</td>
        <td>UnitPrice</td>
        <td>StockQty</td>
        <td>Action</td>
      </tr>
      <?php
      require 'MySQLConn.php';
      $rows = mysqli_query($conn, "SELECT * FROM Item");
      ?>
      <?php foreach($rows as $row) : ?>
      <tr id = <?php echo $row["ItemId"]; ?>>
        <td><?php echo $row["ItemId"]; ?></td>
        <td><?php echo $row["ItemName"]; ?></td>
        <td><?php echo $row["UnitPrice"]; ?></td>
        <td><?php echo $row["StockQty"]; ?></td>
        <td>
          <!-- <a href="edit.php?id=<?php echo $row['ItemId']; ?>">Edit</a> -->
          <button type="button" onclick = "edit();">Edit</button>
          <button type="button" onclick = "delete();">Delete</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="insert.php">Add Item</a>
  </body>
</html>