<?php
    include "../db_controller.php";
    session_start();
if(isset($_SESSION['id']))
{
    header("location: dashboard.php");
}
if(isset($_POST['submit'])){
    $first=$_POST['Username'];
    $last=$_POST['Lastname'];
    $username=$_POST['Username'];
    $pass=$_POST['Password'];
    $c_pass=$_POST['c_password'];
    if($first==''){
        echo "<script>alert('Please enter firstname')
        </script>";
       exit();
    }
    if($last==''){
        echo "<script>alert('Please enter lastname')
        </script>";
       exit();
    }
    if($username==''){
        echo "<script>alert('Please enter Username')
        </script>";
       exit();
    }
    if($pass=='' && $pass<6){
        echo "<script>alert('Please enter  Password')</script>";
       exit();
    }
   
       if($c_pass==''){
        echo "<script>alert('Please enter Confirm Password')
        </script>";
        
       }
           
       elseif($pass != $c_pass){
        echo "<script>alert('passwords doesn't match')</script>";
     }
     $get_user="SELECT * FROM admin WHERE username='$username' AND password='$pass'";
     $result= mysqli_query($connection, $get_user);
     if(mysqli_num_rows($result)>1)
     {
         echo "<script>alert('Details Are Already Submitted')</script>";
         exit();
     }
     else
     {
       $query="INSERT INTO admin (id, username, password) VALUES ('', '$username',  '$pass') ";
          $res= mysqli_query($connection, $query);
            if(!$res){
                  die("query failed".mysqli_error($connection));
             }  
             header("location:index.php");
             }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="../css/form.css">
</head>
<style>
body{
	 /* background-color:lightgreen;
	 margin-top: 50px;
  margin-bottom: 100px;
  margin-right: 250px;
  margin-left: 200px; */
  width: 100%;
                  background: url(../image/admin--.jpg) ;
				  /* background: url(../image/login4.jpg) ; */
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
						<div class="box-body">
							<center> <h2 style="font-family: Noto Sans;">Register </h2></center><br>
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
									<button class="btn btn-primary btn-block" style="background: -webkit-linear-gradient(left,#a445b2,#d41872,#fa4299);" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="index.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

<!-- <div class="form">


    <center>
    <h1>Registeration</h1>
    
    
    <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
            
          <input placeholder="Enter First Name"  type="text" name="Firstname" class="form-control"><br>
            </div>
          
         
      
         
<div class="form-group">
<input placeholder="Enter Last Name" type="text" name="Lastname" class="form-control"><br>
</div>         
      
<div class="form-group">

          <input placeholder="Enter Username" type="text" name="Username" class="form-control">
</div>
          <label> <p id="length" class="invalid"></p></label>
            <input id="myInput" placeholder="Enter Password (minimum length : 10 words)" id="psw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" name="Password" title="Must contain at least 10 or more characters" required class="form-control">
            <input type="checkbox" onclick="myFunction()">Show Password

            <label><p id="length" class="invalid"></p></label>
            <input id="myInput2"placeholder="Enter Confirm Password (minimum length : 10 words)" id="psw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" name="c_password"  title="Must contain at least 10 or more characters" required class="form-control"><br>
            <input type="checkbox" onclick="myFunction2()">Show Password<br><br>

            <input  type="submit" name="submit" class="btn btn-primary"><br>

    </form>
    </center>
    <center>

<a  href="index.php">Login</a> -->
</center>
</div>
<script>
 function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        }
        function myFunction2() {
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        }
    var myInput = document.getElementById("psw");

    var length = document.getElementById("length");

    if(myInput.value.length >= 10) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

    </script>
</body>
</html>