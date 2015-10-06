 <!--navigation bar-->
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
     <li><a class="navbar-brand title" href= "#Home">E-Shop</a></li>
      <div class="dropdown">
</div>
    </div>
   <div class="collapse navbar-collapse link-button" id="myNavbar">
   
      <ul class="nav navbar-nav navbar-right">

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
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
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
                <input type="VARCHAR" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
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
            <form class="form-horizontal" action="Signup.php" method= "POST">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->

            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="Email" class="form-control" type="text" placeholder="abc@abc.com" class="input-large" required="">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="first_name">First name:</label>
              <div class="controls">
                <input id="first_name" name="first_name" class="form-control" type="text" placeholder="firstname" class="input-large" required="">
              </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="last_name">Last name:</label>
              <div class="controls">
                <input id="last_name" name="last_name" class="form-control" type="text" placeholder="last_name" class="input-large" required="">
              </div>
            </div>
            
            <!-- Password input-->
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
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
          
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
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