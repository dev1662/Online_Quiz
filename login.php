<?php
		ob_start();
		include "db_controller.php";
		session_start();
		if(isset($_SESSION['id']))
		{
			header("location: welcome.php");
		}

						
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login | Online Quiz System</title>
		<link rel="icon" href="image/title-home.jpg" >
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
	
		<link rel="stylesheet" href="css/form.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
							<center>

								<img src="image/th.jpg" alt="">
							</center>
						<center> <h5 style="font-family: Noto Sans;">Login to </h5><h4 style="font-family: Noto Sans;">Online Quiz System</h4></center><br>
						<?php 
						if(isset($_POST['submit']))
						{	
							$email = $_POST['email'];
							$pass = $_POST['password'];
							
							$email = mysqli_real_escape_string($connection,$email);
							$pass = mysqli_real_escape_string($connection,$pass);					
							$str = "SELECT * FROM register WHERE email='$email' and password='$pass'";
							$result = mysqli_query($connection,$str);
							if($result->num_rows == 1){
											$row=$result->fetch_assoc();
											$_SESSION['id'] = $row['id'];
											header("location: welcome.php?username=".$row['email']);
																			
										 }
									  							
										else{
										   echo "<script> confirm('invalid username password');</script>";
										}
									}
						if(isset($_POST['submit'])){
							
							$sql = "Select * from register where email = '" . $_POST["email"] . "'";
								if(!isset($_COOKIE["member_login"])) {
									$sql .= " AND password = '" . ($_POST["password"]) . "'";
							}
								$result = mysqli_query($connection,$sql);
							$user = mysqli_fetch_array($result);
							if($user) {
									$_SESSION["id"] = $user["id"];
									
									if(!empty($_POST["remember"])) {
										setcookie ("member_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
									} else {
										if(isset($_COOKIE["member_login"])) {
											setcookie ("member_login","");
										}
									}
							} else {
								$message = "Invalid Login";
							}
						}
						?>
							<form method="post"  enctype="multipart/form-data">
								<div class="form-group">
									<input type="email" name="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"  placeholder="Username or Email Id" class="form-control">
								</div>
								
								<div class="form-group">
									<input id="myInput" type="password"   name="password" placeholder=" Password" class="form-control">
                                    <input type="checkbox" onclick="myFunction()">Show Password
									
								</div> 
								<div class="field-group">
									<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
									<label for="remember-me">Remember me</label>
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div   class="form-group ">
								<i class="material-icons">lock</i>
									<a  href="forgot.php"><u >Forgot Password ?</u></a>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="registeration.php">Register</a> 
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