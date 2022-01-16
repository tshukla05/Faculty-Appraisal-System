<?php session_start(); ?>
<!DOCTYPE html>
  <html>
     <head>
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <link rel="icon" href="fevicon.ico" type="image/gif" sizes="16x16">
          <title>Login | Faculty Appraisal</title>
    </head>

    <body>
    
    <?php
     include('header.php'); 
  ?>
    
    <div class="row"></div>
    <div class="row"></div>
   <div class="row"></div> 
   <div class="row"></div> 
  <div class="row"></div>
 
  
  <div class="row">
    <div class="row">
      <h3 class="center-align">Log in</h3>
    </div>
    
    <form class="col s7" method="POST">
    
     <div class="row">
    <div class="input-field col s7 s7 offset-s7 grid-example">
          <i class="material-icons prefix">email</i>
          <input name="email" type="email" class="validate" id="email" required>
            <label data-error="wrong" data-success="right">Email</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s7 s7 offset-s7 grid-example">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" type="password" name="password" class="validate" required>
            <label for="password">Password</label>
          </div>
        </div>
      
      
      <div class="row col s11 s8 offset-s8 grid-example">
        <button class="btn waves-effect waves-light #ff6f00 amber darken-4" type="submit" name="login">Login
        </button>&nbsp;&nbsp;&nbsp;&nbsp;
            
        <button class="btn waves-effect waves-light #ff6f00 amber darken-4" type="reset">Reset
        </button>
      </div>
      
      <div class="row">
      </div>
      
      <div class="row row col s11 s8 offset-s8 grid-example">
        <a href="register.php">New User?</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="forgotpwd.php">Forgot Password?</a>
      </div>
    </form>
  </div>
  
   <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  <div class="row">
  </div>
  <div class="row">
  </div>

 <?php 
    include('footer.php');
  ?>


  <?php
    
        class Login
        {
            function select_data()
            {
                include('connection.php');
                
                if(isset($_POST['login']))
                {
                    $email=$_POST["email"];
                    $password=$_POST["password"];
          
          			    $admin_sql="select aid,email,password from admin_table where email='$email' and password='$password'";
                    
                    $admin_res=mysqli_query($conn,$admin_sql);
                    
                    if($admin_res->num_rows>0)
                    {
                        while($admin_row=mysqli_fetch_array($admin_res))
                        {
                             $_SESSION['aid']=$admin_row['aid'];
                             $_SESSION['email']=$admin_row['email'];
                             $_SESSION['password']=$admin_row['password'];  
                             echo "<script>location.href = 'admin_home.php'</script>";         
                        }
                    }  
                    else
                    {
                    	$sql="select fid,firstname,email,password from register where email='$email' and password='$password'";
                  		
                  		$res=mysqli_query($conn,$sql);
                   		if($res->num_rows>0)
                   		{
                        	while($row=mysqli_fetch_array($res))
                        	{
                            	  $_SESSION['fid']=$row['fid'];
                              	$_SESSION['fname']=$row['firstname'];
                              	$_SESSION['email']=$row['email'];
                              	$_SESSION['password']=$row['password']; 
                              echo "<script>location.href = 'user_home.php'</script>";
                        	}
                    	} 
          				else
                    	{
                        	 echo "<script type='text/javascript'>Materialize.toast('Email Id Or Password Is Incorrect', 5000, 'rounded')</script>";
                        }

                    }  

                 }
            } 
        }
    
    $obj=new Login;
    $obj->select_data();
  ?>
   </body>
   </html>  