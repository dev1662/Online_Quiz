<?php 
include "db_controller.php";
// require_once "Mail.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Reset Password</title>
    <link rel="icon" href="image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
	
    <link rel="stylesheet" href="css/form.css">

</head>
<style>
     body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
</style>
<body>
<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body" >
                            <center>

                                <img src="image/reset2.png"  width="40%" alt="">
                            </center>
                            
                        <center> <h4 style="font-family: Noto Sans;  ">Trouble Logging in? </h4></center>
                                <?php 
                                if(isset($_POST['submit'])){
                                    $email=$_POST['email'];
                                    $password = substr(md5(uniqid(rand(),1)),3,10);
                                    $pass2=$password;
                                    $pass = md5($password);
                                    
                                    $to = $email;
                                    $subject = "Password Recovery";
                                    $message="";
                                    
                                     $message = "Hi ".$email.",
                                    
                                    You  have requested your account details.
                                    Here is your account information please keep this as you may need this at a later stage:
                                    1.  Your email ID is : ".$email."
                                    2.  Your password is : $password .
                                    Your password has been reset please login with the above password.
                                    Regards Your Website";
                                    
                                    $from= "sindhwanidev@gmail.com";
                                    $headers = "From: $from" ;
                                    $select=mysqli_query($connection,"SELECT * FROM register WHERE email='$email'");
                                    if (mysqli_num_rows($select) > 0) {
        
                                        $row = mysqli_fetch_assoc($select);
                                        // if($email==isset($row['email']))
                                        // {
                                            if(mail($to, $subject, $message, $headers)){
                                
                                                // echo '<script> alert("Mail has been sent to <b>$to</b>.");</script>.<br>.';
                                                echo "<script>  confirm ('Mail has been sent successfully to $to.');</script>";
                                                $sql = mysqli_query($connection,"UPDATE register SET password='$password', confirm_password='$pass2' WHERE email = '$email'");
            
                                            }
                                            else{
                                                echo "<script> confirm ('Mail has not been sent to $to. ');</script>";
                                            
                                            }
                                        //}
                                           
                                    }
                                    else{

                                  echo '<script>  confirm ("Email doesnt exist."); </script>';
                            }
                        
                                

                                }?>
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">

                                <p style="color: gray;">Enter your Email and we'll send you a link to get back into your account.</p> <input type="email" placeholder="Email" name="email" class="form-control"  >
                                </div>
                              
                                <div class="form-group text-right">

                                <input class="btn btn-primary btn-block" type="submit"  name="submit" value="Get New Password">
                                </div>
                                </form>    
                                <div class="or"  >
                                    <center>

                                       <b style="color:grey;"> ----------------------OR----------------------</b>
                                    </center>
                                </div><br>
                                <div class="create-account">
                                    <center>

                                        <a href="registeration.php">Create your account</a>
                                    </center>
                                </div><br><br><br>  
                                <div style="height:44px; border: 1px solid grey; " class="back-to-login">
                                    <center>
                                        <a  href="login.php">Back to Login</a>
                                        
                                    </center>
                               
                                </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
</body>
</html>
