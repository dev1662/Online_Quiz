<?php
include "../db_controller.php";

if(isset($_GET['edit_user'])){
    $the_user_id=$_GET['edit_user'];
}
$query="SELECT * FROM question_option_mapping WHERE id=$the_user_id";
$select_category_edit=mysqli_query($connection, $query);
        while($row=mysqli_fetch_assoc($select_category_edit)){
    $id = $row ['id'];
     $ques1 = $row['option_value'];
    $status2 = $row['status'];
   
        }
if(isset($_POST['edit_user'])){
    $option_value = $_POST['option_value'];
    $status = $_POST['status'];
    

    if($option_value==''){
        echo "<script>alert('Dont leave it empty')</script>";

    }elseif($status==''){
        echo "<script>alert('Dont leave it empty')</script>";

    }else{
            $query="UPDATE question_option_mapping SET option_value= '$option_value', status= '$status' WHERE id='$the_user_id'";
    // $query .="question_desc= '$ques', ";
    // $query .="status= '$status', ";
    // $query .="WHERE = '$status', ";
        // echo $query;

    $edit_users_query=mysqli_query($connection,$query);
    }
    // confirm($edit_users_query);
    header("location: view_answers.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE ANSWERS</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<style>
     body {
        background: rgba(0, 128, 0, 0.6);
        	 margin-top: 10px;
  /* margin-bottom: 100px;
  margin-right: 250px;
  margin-left: 200px; */
  font-family: Sans-serif;
     }
    .form-control{
            margin-right: 30px;
            border-radius:6px;
            font-size:18px;
            font-weight:500px;
                    }
        .form {
          
        border:4px solid white;
        padding-bottom: 50px;
        margin-left: 50px;
        margin-right: 50px;
        border-radius: 12px;
        background-color: whitesmoke;
    }
    #button{
            font-size:18px;
            background:DodgerBlue;
            color:white;
           border:2px rgba(255, 99, 71, 0.6);
            text-align: justify;
            font-weight:lighter;
            border-radius:17px; 
            padding-right: 100px;
            padding-left: 100px;
            padding-bottom: 5px;
            cursor:pointer;
            }
</style>
    <body>
        <?php include "dashboard.php";?><br>
        <div class="form">

            <center>
                <h1>Update the information</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" placeholder="Enter the option value..." value="<?php echo $ques1;?>" name="option_value" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <input type="text" placeholder="Enter the status" value="<?php echo $status2;?>" name="status" class="form-control">
                    </div><br>
                
                    <div class="form-group">
                    <input type="submit" id ="button"class="btn btn-success" name="edit_user" value="Update Option Value">
                    </div>
                </form>
            </center>
        </div>
</body>
</html>