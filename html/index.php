<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<script>
    var request;  
function insert()  
{  
var v=document.vinform.t1.value;  
var url="insert.php?id="+v;  
  
if(window.XMLHttpRequest){  
request=new XMLHttpRequest();  
}  
else if(window.ActiveXObject){  
request=new ActiveXObject("Microsoft.XMLHTTP");  
}  
  
try  
{  
request.onreadystatechange=getInfo;  
request.open("GET",url,true);  
request.send();  
}  
catch(e)  
{  
alert("Unable to connect to server");  
}  
}  
  
function getInfo(){  
if(request.readyState==4){  
var id=request.responseText;  
document.getElementById('amit').innerHTML=id;  
}  
}  

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