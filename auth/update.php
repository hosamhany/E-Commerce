<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <!-- linking the bootstrap and jquery libraries to the html file as well as the css file.-->
  <link rel="stylesheet" type="text/css" href="update.css">
  <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <link href='https://fonts.googleapis.com/css?family=Noto+Serif&subset=latin,cyrillic-ext,vietnamese,greek-ext,greek,latin-ext' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="myscripts.js"></script>
      <div class="container-fluid">
      <title>Edit information</title></head>
 <body>
  <h1>Edit user information</h1>
  <hr>
  <form class="form-inline" action="edit.php" method= "POST" name = "edit">
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="VARCHAR" name= "first_name" class="form-control" id="first_name" >
    </div><br><br>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="VARCHAR" name= "last_name" class="form-control" id="last_name">
    </div><br><br>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control" id="password">
    </div><br><br>
    <div class="form-group">
      <label for="repass">Re-enter password:</label>
      <input type="password" name="repass" class="form-control" id="repass">
    </div><br><br>
    <div class="form-group">
      <label for="avatar">Avatar</label>
      <input type="TEXT" name="avatar" class="form-control" id="avatar">
    </div><br><br>
      <button id="edit" name="edit" type = "submit"class="btn btn-success">Edit info</button>
</form>
</body>
</html>