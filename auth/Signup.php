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

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}

if(isset($_POST['signup']))
{
 $fname = ($_POST['first_name']);
 $lname = ($_POST['last_name']);
 $email = ($_POST['email']);
 $pass = ($_POST['password']);
 $repass = ($_POST['repass']);
 $avatar = ($_POST['avatar']);
 if($pass!=$repass)
 {
 	?>
 	<script>alert('Passwords do not match')</script>
 	
 <?php
 }

 else{
 $res = mysqli_query($conn, "INSERT INTO users(first_name, last_name, email, password, avatar) VALUES ('$fname', '$lname', '$email', '$pass', '$avatar')");

 if($res)
 {

 		$email = ($_POST['email']);
 		$res=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
 		$count = mysqli_num_rows($res);
 		$row= mysqli_fetch_array($res);
 		if($count == 1)
 		{
  			$_SESSION['user'] = $row['first_name'] . " ". $row['last_name'];
  			$_SESSION['loggedin']= true;
  			header("Location: Home.php");

 		}
 	}
}
}
?>