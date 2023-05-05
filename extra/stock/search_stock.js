function searchStock(value) {
    $(document).ready(function () {
      var search = value;
      $.ajax({
        url: "../../extra/stock/search_stock.php",
        method: "POST",
        data: {
            search: search
        },
        success: function (data) {
          $("#stock").html(data);
        }
      });
  
    });
  
  }