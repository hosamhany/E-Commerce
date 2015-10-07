<!DOCTYPE html>
<!-- connecting the server-->
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

    if( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
      header("Location: Home.php");
    }

?>
<html>
<head>
  <!-- linking the bootstrap and jquery libraries to the html file as well as the css file.-->
  <link rel="stylesheet" type="text/css" href="Eshop_css.css">
  <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <link href='https://fonts.googleapis.com/css?family=Noto+Serif&subset=latin,cyrillic-ext,vietnamese,greek-ext,greek,latin-ext' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="myscripts.js"></script>
      <div class="container-fluid">
      <title>E-shop</title>
     

</head>
<body>


  <!--navigation bar-->
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
     <a class="navbar-brand title" href= "Home.php">E-Shop</a>
      <div class="dropdown">
</div>
    </div>
   <div class="collapse navbar-collapse " id="myNavbar">
   
      <ul class="nav navbar-nav navbar-right glyphs">

         <li> <button class="btn btn-link glyphicon glyphicon-log-in btn-md"role="link" type="submit" name="op" data-toggle="modal" data-target="#login_signup_modal" id="signin" value="Link 1"> Login</button> </li>

        <li> <button class="btn btn-link glyphicon glyphicon-user btn-md" role="link" type="submit"  data-toggle="modal" data-target="#login_signup_modal"> SignUp</button> 
        </li>

      </ul>
    </div>
</nav>

<!-- Modal -->

  <div class="modal fade bs-modal-sm" id="login_signup_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Signup</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        
        <div class="tab-pane fade active in" id="signin">
           
            <form class="form-horizontal" action="Login.php" method= "POST" name="signin">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            
            <div class="control-group">
              <label class="control-label" for="userid">Email:</label>
              <div class="controls">
                <input type="VARCHAR" id="userid" name="email" type="text" class="form-control" placeholder="abc@abc.com" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input type="password" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group remember">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                  Remember me
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-success" type="submit">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div> 
        <!-- 
          
          -->
  <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" action="Signup.php" method= "POST" name = "signup">
            <fieldset>
            <!-- Sign Up Form -->
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="firstname">First Name:</label>
              <div class="controls">
                <input id="first_name" name="first_name" class="form-control" type="VARCHAR" placeholder="Tommy" class="input-large" required="">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="lastname">Last Name:</label>
              <div class="controls">
        <input id="last_name" name="last_name" class="form-control" type="VARCHAR" placeholder="Emanuel" class="input-large" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="email">Email:</label>
              <div class="controls">
                <input id="email" class="form-control" name="email" type="VARCHAR" placeholder="tommy.emanuel@example.com" class="input-large" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="repass" class="form-control" name="repass" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
          
            <div class="control-group">
              <label class="control-label" for="avatar">Profile picture:</label>
              <div class="controls">
                <input id="avatar" class="form-control" name="avatar" type="TEXT" placeholder="No file chosen" class="input-large" required="">
              </div>
            </div>

            <!-- Button -->
              <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="signup" name="signup" type = "submit"class="btn btn-success">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
</div>
</br>
<br>

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>Too tired to shop?!</h1>        

        </hgroup>

      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">        
        <hgroup>
            <h1>Can't find what you are looking for?!</h1>        

        </hgroup>       

      </div>
    </div>
    <div class="item slides inner">
      <div class="slide-3"></div>
      <div class="hero">        
        <hgroup>
            <h1>Shop here و اشتري دماغك</h1> 
            <br>
           <a href="Home.php" class="btn btn-info btn-lg shop" >Start Shopping!</a>
         </div>
            <br>
            <br>
        </hgroup>

      </div>
    </div>
  </div> 
</div>
</body>
           

</html>