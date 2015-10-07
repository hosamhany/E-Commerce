<?php
session_start();


    $server_name= "localhost";
    $user_name= "root";
    $password_name = "";
    $db_name= "ecommerce";
    $conn = mysqli_connect ($server_name, $user_name, $password_name, $db_name);
    if(!$conn)
    {

      die (include"ServerDown.html");
    }


if(isset($_SESSION['user'])!="")
{

 header("Location: Login.php");
}
if(isset($_POST['signin']))
{
 $email = ($_POST['email']);
 $upass = ($_POST['passwordinput']);
 if(empty($email)){
  ?>
  <script> alert('email is missing')</script>
  <?php
  exit(include"Home.php");
  
 }
 $res=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password = '$upass' ");
 $count = mysqli_num_rows($res);
 $row= mysqli_fetch_array($res);
 if($count == 1)
 {
  $_SESSION['id'] = $row['id'];
  $_SESSION['user'] = $row['first_name'] . " ". $row['last_name'];
  $_SESSION['loggedin']= true;

  include"Home.php";

 }
 else
 {
  ?>
        <script>alert('Wrong email or password');</script>
        <?php
        include'Home.php';

 }
 
}
?>