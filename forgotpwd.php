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
      <title>Forgot_Password | Faculty Appraisal</title>

    </head>
    <body>
      
     <?php include('header.php'); ?>
      <div class="row"></div>
     <div class="row"></div>
     <div class="row"></div>
     <div class="row"></div>
     
  
  
  <div class="row">
    <div class="row">
      <h5 class="center-align">Forgot_Password Form!</h5>
    </div>
    
    <form class="col s7" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
    
    
   
      <div class="row">
    <div class="input-field col s7 s7 offset-s7 grid-example">
          <i class="material-icons prefix">email</i>
          <input name="email" type="email" class="validate" required>
            <label data-error="wrong" data-success="right">Enter Registered Email-ID</label>
          </div>
        </div>

    
       <div class="row">
    <div class="input-field col s7 s7 offset-s7 grid-example">
      <i class="material-icons prefix">phone</i>
      <input name="mobile_contact" type="text" class="validate" data-length="10" pattern="[0-9]{10}" required>
      <label data-error="wrong" data-success="right">Contact(M)</label>
    </div>
  </div>

    <div class="row"></div>
     <div class="row"></div>
     <div class="row"></div>
    
      <div class="row col s11 s8 offset-s8 grid-example">
            <button class="btn waves-effect waves-light #ff6f00 amber darken-4" type="submit" name="submit">Submit
            </button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn waves-effect waves-light #ff6f00 amber darken-4" type="reset" name="reset">Reset</button><br><br>
             
        </div>
      </form>
  </div>
  
  
  <div class="row">
  </div>
  
  
  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <?php include('footer.php'); ?>

</body>
</html>
 <?php 
 class Forgotpwd
    {
      	function sndmail()
      	{
        	include('connection.php');
		    	if(isset($_POST['submit']))
        	{
  			       $mob = $_POST['mobile_contact'];
 			         $email = $_POST['email'];
			         $sql = "select password from register where contact_m='$mob' and email='$email'";
 			         $res = mysqli_query($conn,$sql);
 			         
                if($res->num_rows>0)
 			            {
 			        		      while($row=mysqli_fetch_array($res))
 				             	   {
 							            
                            $password = $row['password'];
 							              $to = $email;
            		      		$subject = "Username And Password From Faculty Appraisal";
            			       	$message ="Your Username And Password From Faculty Appraisal And Thankyou For Using Our System" . "\r\n" . "Your EmailId : ".$email."\r\n" . "Your Password : ".$password;
            				      $headers = " From :shuklatejas21@gmail.com" . "\r\n" . "CC : Faculty Appraisal";
           					      if(mail($to,$subject,$message,$headers));
            				      {
                				         echo "<script type='text/javascript'>Materialize.toast('You Username and Password are SuccessFully send to Registered Email!', 5000, 'rounded')</script>";
            				      }
                  
 					            }
 			        }
			else {
 					
              echo "<script type='text/javascript'>Materialize.toast('Records Not Found, Please Enter Valid Details Or Contact Admin For Further Process', 5000, 'rounded')</script>";	
				}

 			}
 		}	
 	}	

 	$fp = new Forgotpwd;
 	$fp->sndmail();

?>


