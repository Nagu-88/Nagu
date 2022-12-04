// $(document).ready(function()
// {
  $("#save").click(function(e)
  { 
    e.preventDefault();
    console.log("Save button clicked");
    let Item_Id = $("#ItemId").val();
    let Item_Name = $("#ItemName").val();
    let Unit_Price = $("#UnitPrice").val();
    let Stock_Qty = $("#StockQty").val();
    let Suppier_Id = $("#SupplierId").val();
    
    myData = {ItemId:Item_Id, ItemName:Item_Name, UnitPrice:Unit_Price, StockQty:Stock_Qty, SupplierId:Suppier_Id};
    console.log(myData);

    // Calling ajax
    $.ajax({
      url:"db.php",
      method: "POST",         
      data: JSON.stringify(myData),

      success: function(data) 
      {
        console.log(data);  
      }
    });
  });
// });