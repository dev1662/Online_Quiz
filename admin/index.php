 <?php
ob_start();
include "../db_controller.php";
session_start();
if(isset($_SESSION['id']))
{
    header("location: dashboard.php");
}


      
?>
<?php		
?>



<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>| Admin Login |</title>
        <link rel="icon" href="../image/title-home.jpg" >
		<link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
	
		<link rel="stylesheet" href="../css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(../image/admin--.jpg) ;
				  /* background: url(../image/login4.jpg) ; */
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;

                }


				
          </style>
</head>

<body>
		<section class="login first grey">
			<div  class="container">
				<div  class="box-wrapper">				
					<div style="background-color:snow; border-radius:5px;" class="box box-border">
						<div class="box-body">
                            <center>

                                <img src="../image/admin.gif" width="80%" alt="">
                            </center>
						<center> <h4 style="font-family: Noto Sans; color:cadetblue;">Login Form </h4><h5 style="font-family: Noto Sans; color:cadetblue;"><i>Login please for further process</i></h5></center><br>
						<?php 
						if(isset($_POST['submit'])){
                            $username=$_POST['Username'];
                            $pass=$_POST['Password'];
                            
                                    
                                    
                                    $query="SELECT * FROM admin WHERE username='$username' AND password='$pass' ";
                                    $result=mysqli_query($connection,$query);
                                    if($result->num_rows == 1){
                                        $row=$result->fetch_assoc();
                                        $_SESSION['id'] = $row['id'];
                                
                                        header("location: dashboard.php?username=".$row['username']);
                                        
                                        
                                    }
                                    
                                        
                                        else{
                                            echo "<script> confirm('invalid username password');</script>";
                                        }
                                   }

						?>

							<form class="login100-form validate-form p-b-33 p-t-5" method="post"  enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" name="Username" placeholder="Username or Email Id" class="form-control">
								</div>
								<div class="form-group">
									<input id="myInput" type="password" name="Password" placeholder=" Password" class="form-control">
                                    <input type="checkbox" onclick="myFunction()">Show Password

								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" style="background: -webkit-linear-gradient(left,#a445b2,#d41872,#fa4299);; border-radius:5px;" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a style="color:lightseagreen;" href="register.php">Register</a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		
        <script>
             function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        }
        </script>
</body>
</html>