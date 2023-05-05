function transferCalc(transfer, pos, cash, total, old_deposit, transport, charges) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("paidBal").innerHTML = this.responseText;
      selectBank();
  
    }
  };
  xhttp.open("GET", "../../extra/checkout/deposit.php?cash=" + cash + "&pos=" + pos + "&transfer=" + transfer + "&total=" + total + "&old_deposit=" + old_deposit + "&transport=" + transport + "&charges=" + charges, true);
  xhttp.send();
  
  }
function cashCalc(cash, pos, transfer, total, old_deposit, transport, charges) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("paidBal").innerHTML = this.responseText;
    
      }
    };
    xhttp.open("GET", "../../extra/checkout/deposit.php?cash=" + cash + "&pos=" + pos + "&transfer=" + transfer + "&total=" + total + "&old_deposit=" + old_deposit + "&transport=" + transport + "&charges=" + charges, true);
    xhttp.send();
    
    }
    
    function posCalc(pos, transfer, cash, total, old_deposit, transport, charges) {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("paidBal").innerHTML = this.responseText;
        selectPos();
    
      }
    };
    xhttp.open("GET", "../../extra/checkout/deposit.php?pos=" + pos + "&cash=" + cash + "&transfer=" + transfer + "&total=" + total + "&old_deposit=" + old_deposit + "&transport=" + transport + "&charges=" + charges, true);
    xhttp.send();
    
    }
    
    function transportCalc(transport, pos, transfer, cash, total, old_deposit, charges) {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("paidBal").innerHTML = this.responseText;
    
      }
    };
    xhttp.open("GET", "../../extra/checkout/deposit.php?transport=" + transport + "&pos=" + pos + "&cash=" + cash + "&transfer=" + transfer + "&total=" + total + "&old_deposit=" + old_deposit + "&charges=" + charges, true);
    xhttp.send();
    
    }
    
    function addCharges(charges, transfer, pos, cash, total, old_deposit, transport) {
    const xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("paidBal").innerHTML =
          this.responseText;
      }
    };
    xhttp.open("GET", "../../extra/checkout/deposit.php?charges=" + charges + "&cash=" + cash + "&pos=" + pos + "&transfer=" + transfer + "&total=" + total + "&old_deposit=" + old_deposit + "&transport=" + transport, true);
    xhttp.send();
    }
    
    function addTransport() {
        var checkBox = document.getElementById("add_transport");
        if (checkBox.checked == true) {
          const xhttp = new XMLHttpRequest();
    
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("transportDiv").innerHTML =
                this.responseText;
            }
          };
          xhttp.open("GET", "../../extra/checkout/transport.php", true);
          xhttp.send();
        } else {
          const xhttp = new XMLHttpRequest();
    
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("transportDiv").style.display = "none";
    
            }
          };
          xhttp.open("GET", "../../extra/checkout/transport.php", true);
          xhttp.send();
        }
    
      }
    
      // function selectBank() {
      //   const xhttp = new XMLHttpRequest();
    
      //   xhttp.onreadystatechange = function() {
      //     if (this.readyState == 4 && this.status == 200) {
      //       document.getElementById("select_bank").innerHTML =
      //         this.responseText;
      //     }
      //   };
      //   xhttp.open("GET", "../../extra/checkout/select_bank.php", true);
      //   xhttp.send();
      // }
      // function selectPos() {
      //   const xhttp = new XMLHttpRequest();
    
      //   xhttp.onreadystatechange = function() {
      //     if (this.readyState == 4 && this.status == 200) {
      //       document.getElementById("select_pos").innerHTML =
      //         this.responseText;
      //     }
      //   };
      //   xhttp.open("GET", "../../extra/checkout/pos.php", true);
      //   xhttp.send();
      // }