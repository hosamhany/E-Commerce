
     function addToCart(p_id) {
    console.log("hello there");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      $("#add-cart").addClass("disabled");
      if(xhttp.responseText == "1") {
        document.getElementById("add-cart").innerHTML = "Added";
      }
      else {
        document.getElementById("errors").innerHTML = "Already there";

      }
    }
    xhttp.open("GET", "cart/add_to_cart.php?product_id="+p_id, true);
    xhttp.send();
  }