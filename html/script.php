<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData(action){
    $(document).ready(function(){
      var data = {
        action: action,
        ItemId: $("#ItemId").val(),
        ItemName: $("#ItemName").val(),
        UnitPrice: $("#UnitPrice").val(),
        StockQty: $("#StockQty").val(),
      };

      $.ajax({
        url: 'functions.php',
        type: 'post',
        data: data,
        success:function(response){
          alert(response);
          if(response == "Deleted Successfully"){
            $("#"+action).css("display", "none");
          }
        }
      });
    });
  }

  $(document).on('submit', function()) {
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
</script>

