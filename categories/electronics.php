<?php

session_start();

    $server_name= "127.0.0.1";
    $user_name= "root";
    $password_name = "";
    $db_name= "ecommerce";
    $conn = mysqli_connect ($server_name, $user_name, $password_name, $db_name);
    if(!$conn)
    {
      die ('Connection error' .mysqli_connect_error());
    }

$query = "SELECT name, price, details, quantity, id FROM products WHERE type = 'electronics'";


$result = mysqli_query($conn, $query);

?>
<head>
    <link rel="stylesheet" type="text/css" href="../auth/Home.css">
    <script type="text/javascript" href="../assets/js/master.js"></script>
    <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <link href='https://fonts.googleapis.com/css?family=Noto+Serif&subset=latin,cyrillic-ext,vietnamese,greek-ext,greek,latin-ext' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
    <h1>
        Electronics
    </h1>

    <hr>

<?php

while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    if ($row[3] == 0)
    {
?>
  <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <h2> 

        <?php
         printf($row[0]);
        ?>
         </h2> 
         <h4>
             <?php
                 printf("$ %s", $row[1]);
            ?>
         </h4>

        <h3>
            Sold Out!
         </h3>
        <img src="../auth/formal.jpg" alt="Men" style="width:250px;height:250px">
        <p>
            <?php
                 printf("Details: %s", $row[2]);
            ?>
        </p>
            </div>

<?php

    }
    else
    {
?>
      <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <h2> 

        <?php
         printf($row[0]);
        ?>
         </h2> 
         <h3>
             <?php
                 printf("$ %s", $row[1]);
            ?>
         </h3>

        <h3>
             <?php
                 printf("Stock: %d", $row[3]);
            ?>
         </h3>
        <img src="../auth/formal.jpg" alt="Men" style="width:250px;height:250px">
        <p>
            <?php
                 printf("Details: %s", $row[2]);
            ?>
            <button onclick='addToCart(<?php echo $row[4] ?>)' class="btn btn-link"
            role="link" type="submit"  id="add-cart">Add to Cart</button>
            <div id="errors" class="label label-danger"></div>
        </p>
            </div>

<?php

    }
}

?>
<script type="text/javascript">
    function addToCart(p_id) {
    console.log("hello there");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      // $("#add-cart").addClass("disabled");
      // if(xhttp.responseText == "1") {
      //   document.getElementById("add-cart").innerHTML = "Added";
      // }
      // else {
      //   document.getElementById("errors").innerHTML = "Already there";

      // }
      document.getElementById("errors").innerHTML = "Added!";
      // document.getElementById("add-cart").innerHTML = xhttp.responseText;
    }
    xhttp.open("GET", "../cart/add_to_cart.php?product_id="+p_id, true);
    xhttp.send();
  }
</script>