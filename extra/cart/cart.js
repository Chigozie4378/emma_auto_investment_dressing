
displayCart()
function addToCart(value1, value2, value3, value4) {
  $(document).ready(function () {
    var productname = value1;
    var quantity = value2;
    var price = value3;
    var qty_db = value4
    if (quantity != "") {
      $.ajax({
        url: '../../extra/cart/cart.php',
        method: "POST",
        data: {
          productname: productname,
          quantity: quantity,
          price: price,
          qty_db: qty_db
        },
        success: function () {
          displayCart();
          document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');

        }
      });
    }
  });

}

// function displayCart() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("cart").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("POST", "../../extra/cart/display_cart.php", true);
//   xhttp.send();
// }

function displayCart() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Create a virtual DOM where you can query for elements in the response
      var parser = new DOMParser();
      var doc = parser.parseFromString(this.responseText, "text/html");

      // Extract the total amount from the response
      var totalAmount = doc.getElementById('tot').value;

      // Set the total amount to the input field
      document.getElementById('balance').value = totalAmount;
      
      // Update the cart HTML
      document.getElementById("cart").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../../extra/cart/display_cart.php", true);
  xhttp.send();
}



function deleteItem(value) {
  $(document).ready(function () {
    var del = value;
    $.ajax({
      url: '../../extra/cart/delete_cart.php',
      method: "POST",
      data: {
        del: del
      },
      success: function () {
        displayCart();
      }
    });

  });

}
function updateQty(value1, value2, value3) {
  $(document).ready(function () {
    var quantity = value1;
    var productname = value2;
    var price = value3;
    $.ajax({
      url: "../../extra/cart/update_cart_qty.php",
      method: "POST",
      data: {
        quantity: quantity,
        productname: productname,
        price: price
      },
      success: function (data) {
        displayCart();
      }
    });

  });

}

