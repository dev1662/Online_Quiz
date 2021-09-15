<?php
include "../db_controller.php";
// session_start();

// if(!isset($_SESSION['id']))
// {
//     header("location: index.php");
// }
if(isset($_POST['submit'])){
    $username = $_POST['username'];
        $pass = $_POST['pass'];
        $new_pass = $_POST['new_pass'];
        $c_pass = $_POST['confirm_pass'];
        // $result = mysqli_query($connection, "SELECT password FROM admin WHERE 
        // username=$username");
        if($username==''){
            echo "<script>alert('Empty username not valid')</script>";
        }elseif($pass==$c_pass){
            echo "<script>alert('You entered incorrect Password')</script>";

        }elseif($new_pass!=$c_pass){
            echo "<script>alert('The Passwords should be exactly same')</script>";

        }
        elseif($pass==$new_pass){
            echo "<script>alert('You entered incorrect password')</script>";

        }
        else{
            $sql=mysqli_query($connection,"UPDATE admin SET password='$c_pass' WHERE 

            username='$username'");
        }
       
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHANGE PASSWORD</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
	
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
<?php include "dashboard.php";?>
<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h2 style="font-family: Noto Sans;">CHANGE PASSWORD </h2></center><br>
							<form method="post"  enctype="multipart/form-data">
							<div class="form-group">
								
                                <div class="form-group">
									<label><b style="color:green;"> Enter Your Username:</b></label>
									<input type="text" name="username" class="form-control" required />
								</div>
								<div class="form-group">
									<label><b style="color:green;">Enter Your Existing Password:</b></label>
									<input type="password" id="myInput" name="pass" class="form-control" required />
                                    <input type="checkbox"  onclick="myFunction()" >Show Password
								</div>
								<div class="form-group">
									<label><b style="color:green;">Enter Your New Password:</b></label>
									<input type="password"  id="myInput2" name="new_pass" class="form-control" required />
                                    <input type="CheckBox" onclick="myFunction2()" >Show Password

                                </div>
								<div class="form-group">
									<label><b style="color:green;">Enter Your Confirm Password:</b></label>
									<input type="password"id="myInput3" name="confirm_pass" class="form-control" required />
                                    <input type="checkbox"  onclick="myFunction3()" >Show Password

								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" style="background: -webkit-linear-gradient(left,#a445b2,#d41872,#fa4299);" name="submit">Update</button>
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
        function myFunction2() {
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        } 
           function myFunction3() {
            var x = document.getElementById("myInput3");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        }
//     var myInput = document.getElementById("psw");

//     var length = document.getElementById("length");

//     if(myInput.value.length >= 10) {
//     length.classList.remove("invalid");
//     length.classList.add("valid");
//   } else {
//     length.classList.remove("valid");
//     length.classList.add("invalid");
//   }

        </script>
</body>
</html>