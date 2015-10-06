<!-- connecting the server-->
<?php 

    $server_name= "localhost";
    $user_name= "root";
    $password_name = "";
    $db_name= "ecommerce";
    $conn = mysqli_connect ($server_name, $user_name, $password_name, $db_name);
    if(!$conn)
    {
      die ('Connection error' .mysqli_connect_error());
    }

?>