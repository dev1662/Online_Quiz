<?php
	include("db_controller.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$firstname = $_POST['firstname'];	
		$lastname = $_POST['lastname'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_pass = $_POST['c_pass'];
		$str="SELECT email from register WHERE email='$email'";
		$result=mysqli_query($connection,$str);
		
		if((mysqli_num_rows($result))>1)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
        }
		else
		{
            $str="INSERT INTO register SET id='', firstname='$firstname', lastname='$lastname', username='$name',email='$email',password='$password',confirm_password='$c_pass'";
			$res=mysqli_query($connection,$str);
			header('location: welcome.php');
		}
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Online Quiz System</title>
		<link rel="icon" href="image/title-home.jpg" >
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
</head>

<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">Register to </h5><h4 style="font-family: Noto Sans;">Online Quiz System</h4></center><br>
							<form method="post"  enctype="multipart/form-data">
							<div class="form-group">
									<label>Enter Your First Name:</label>
									<input type="text" name="firstname" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Last Name:</label>
									<input type="text" name="lastname" class="form-control" required />
								</div>
                                <div class="form-group">
									<label>Enter Your Username:</label>
									<input type="text" name="name" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Email Id:</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Password:</label>
									<input type="password" name="password" class="form-control" required />
                                </div>
								<div class="form-group">
									<label>Enter Your Confirm Password:</label>
									<input type="password" name="c_pass" class="form-control" required />
								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
</body>
</html>