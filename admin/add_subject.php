<?php
    include "../db_controller.php";
    // session_start();
    // if(!isset($_SESSION['id']))
    // {
    //     header("location: index.php");
    // }
    if(isset($_POST['submit'])){
        $sub=$_POST['Subject'];
       $status=$_POST['status'];
        $query="INSERT INTO subject_master (id, subject, status) VALUES ('', '$sub', '$status') ";
        // echo $query;
        $res=mysqli_query($connection,$query);
        if(!$res){
            die("Error in the query");
        }
    }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD SUBJECT</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<style>
     body {
        background: rgba(0, 128, 0, 0.6);
        	 margin-top: 10px;
  /* margin-bottom: 100px;
  margin-left: 200px; */
  /* margin-right: 250px; */
  font-family: Sans-serif;
     }
   
     .form-control{
            margin-right: 200px;
            border-radius:6px;
            font-size:18px;
            font-weight:500px;
                    }
        .form {
          
        border:4px solid white;
        padding-bottom: 50px;
        margin-left: 200px;
        margin-right: 200px;
        border-radius: 12px;
        background-color: whitesmoke;
    }
    /* a{
        border-radius: 25px;
          background: #73AD21;
          padding: 20px;
          width: 20px;
          height: -200px;
          align-items:left;
          color:black;
          text-decoration: none;
    }
    a:hover{
        background-color: brown;
        color: white;
    } */
    /* a{
        border-radius: 25px;
          background: #73AD21;
          padding: 20px;
          width: 20px;
          height: -200px;
          align-items:left;
          color:black;
          text-decoration: none;
    }
    a:hover{
        background-color: brown;
        color: white;
    } */
   
    #formButton{
        border:2px solid black;
        border-radius: 25px;
        padding-left:20px;
        padding-right:20px;
        font-size: 20px;
    }
    #formButton:hover{
        background-color:coral;
    }
    #form2Button{
        border:2px solid black;
        border-radius: 25px;
        padding-left:20px;
        padding-right:20px;
        font-size: 20px;
       
    }
    #form2Button:hover{
        background-color:coral;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<body>
<?php include "dashboard.php";?>
<br>
<div class="form">
        <center>


            <h1>Add Subject</h1>
            
            <form id="Myform" action="" method="post" enctype="multipart/form-data">
            
                    <div class="form-group">
                        <input type="text" name="Subject" placeholder="Enter the Subject" class="form-control">
                    </div>
                    <select class="form-control" name="status" >
                        <option value="">---Select the Status---</option>
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select><br><br>
               
                    <input type="submit" name="submit" name="Add" class="btn btn-primary">
            </form>
        </center>
</div>

</body>
</html>