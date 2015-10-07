<?php
session_start();
 $server_name= "localhost";
    $user_name= "root";
    $password_name = "";
    $db_name= "ecommerce";
    $conn = mysqli_connect ($server_name, $user_name, $password_name, $db_name);
    if(!$conn)
    {

      die ('include:"Location:ServerDown.html"');
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
 $pass =   md5(($_POST['password']));
 $repass = ($_POST['repass']);
 $avatar = ($_POST['avatar']);
 if($_POST['password']!=$_POST['repass'])
 {
 	?>
 	<script>alert('Passwords do not match')</script>
 	
 <?php
 	exit(include'Home.php');
 }

 else{

 	if(empty($fname)){
 		$_POST['val']=false;
 		?>
 		<script>alert('First name can not be empty')</script>
 		<?php
 		exit(include'Home.php');
 	}
 	if(empty($lname)){
 		$_POST['val']=false;
 		?>
 		<script>alert('Last name can not be empty')</script>
 		<?php
 		exit(include'Home.php');
 	}
 	if(empty($email)){
 		$_POST['val']=false;
 		?>
 		<script>alert('Email can not be empty')</script>
 		<?php
 		exit(include'Home.php');
 	}
 	if(empty($pass)){
 		$_POST['val']=false;
 		?>
 		<script>alert('Password can not be empty')</script>
 		<?php
 		exit(include'Home.php');

 	}
 	if(strlen($_POST['password']) < 7)
 		{
 			?>
 			<script>alert('Password must be at least 8 characters')</script>
 			<?php
 			exit(include'Home.php');
 		}
 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		?>
 		<script>alert('Enter a proper email')</script>
 			<?php
 			exit(include'Home.php');
		}
	$email_check = mysqli_query($conn, "SELECT * FROM users WHERE email = $email ");
	if($email_check)
	{
		?>
		<script>alert('User already exists')</script>
 			<?php
 			exit(include'Home.php');
	}
		
	
 	
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