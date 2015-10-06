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

$query = "SELECT name, price, details FROM products WHERE type = 'men'";


$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    printf("Name: %s  Price: %s Details: %s", $row[0], $row[1], $row[2]);
    ?>
    <br>
    <?php  
}

?>