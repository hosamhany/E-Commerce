<?php
session_start();

    $server_name= "localhost";
    $user_name= "root";
    $password_name = "";
    $db_name= "ecommerce";
    $conn = mysqli_connect ($server_name, $user_name, $password_name, $db_name);
    if(!$conn)
    {
      die ('Connection error' .mysqli_connect_error());
    }


if(isset($_SESSION['user'])!="")
{
  $_SESSION['loggedin']= true;
 header("Location: Login.php");
}
if(isset($_POST['signin']))
{
 $email = ($_POST['email']);
 $upass = ($_POST['passwordinput']);
 $res=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password = '$upass' ");
 $count = mysqli_num_rows($res);
 $row= mysqli_fetch_array($res);
 if($count == 1)
 {
  $_SESSION['user'] = $row['first_name'];

  header("Location: Home.php");

 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>