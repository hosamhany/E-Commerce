<?php
session_start();
error_reporting(0);
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
    if(isset($_POST['edit']))
    {
    	$fname = ($_POST['first_name']);
		$lname = ($_POST['last_name']);
 		$pass =   md5(($_POST['password']));
 		$repass = ($_POST['repass']);
 		$avatar = ($_POST['avatar']);
 		$id = ($_SESSION['id']);
 		if($_POST['password']!=$_POST['repass'])
 		{
 			?>
 			<script>alert('Passwords do not match')</script>
 	
 			<?php
 			exit(include'update.php');
 		}
 		else{
 			if(empty($fname)){
 				$_POST['val']=false;
 		?>
 				<script>alert('First name can not be empty')</script>
 				<?php
 				exit(include'update.php');
 			}
 			if(empty($lname)){
 				$_POST['val']=false;
 		?>
 				<script>alert('Last name can not be empty')</script>
 				<?php
 				exit(include'update.php');
 			}
 			if(empty($pass)){
 				$_POST['val']=false;
 		?>
 				<script>alert('Password can not be empty')</script>
 				<?php
 				exit(include'update.php');

 			}
 			if(strlen($_POST['password']) < 7)
 			{
 		?>
 				<script>alert('Password must be at least 8 characters')</script>
 				<?php
 				exit(include'update.php');
 			}
 		}
 	$res = mysqli_query($conn, "UPDATE users SET  first_name = '$fname',last_name= '$last_name'
 		,password ='$password', avatar= '$avatar' WHERE id = '$id' ");
 	if($res)
 	{
 		$_SESSION['id'] = $row['id'];
  		$_SESSION['user'] = $fname . " ". $lname;
  		header("Location:Home.php");
 	}
 	else
 	{
 		include('ServerDown.html');
 	}
 		

 }
}
 	?>