<?php
    include "../db_controller.php";
    // session_start();
    if(isset($_GET['add'])){
        $the_users_id=$_GET['add'];
    }
    // $query="SELECT * FROM question_master WHERE id=$the_users_id";
    // $select_category_edit=mysqli_query($connection, $query);
    // while($row=mysqli_fetch_assoc($select_category_edit)){
    //     $id = $row ['id'];
    // }
    // $query="SELECT subject_id FROM question_option_mapping WHERE id=$the_users_id";
    // $select2_category_edit=mysqli_query($connection, $query);
    // while($row=mysqli_fetch_assoc($select2_category_edit)){
    //     $subject_id = $row ['subject_id'];
    // }
        if(isset($_POST['submit'])){
           
            $countoptionValue = count($_POST['option_value']);
            for($i = 0;$i< $countoptionValue; $i++){
                $q="INSERT INTO question_option_mapping (question_id, subject_id, option_value, is_correct, status) VALUES (".$_POST['Question_id'].",".$_POST['subject_id'].",".$_POST['option_value'][$i].",".$_POST['is_correct'][$i].",".$_POST['status'][$i].")";
                $r=mysqli_query($connection,$q);

            }
            
        }
        // $q12="INSERT INTO question_master SET status=0 WHERE id=$the_users_id";
        // $delete_query=mysqli_query($connection,$q12);
        // if(!$delete_query){
            // die("Error in the query");
        // }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD ANSWERS</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<style>
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
    <div class="form">
        <!-- <center> -->
            <h1 align="center">Add Answers</h1>
            <form id="MyForm" action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <select class="form-control" name = "Question_id">
                    <!--<option>Select Question</option> -->
            <?php 
            $sql="SELECT id,question_desc FROM question_master where status = 1 and id = $the_users_id ";
            $res=mysqli_query($connection,$sql);
            if(!$res){
                die('Could not get data: ' . mysqli_error($connection));
            }
            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                echo '<option value = "'.$row["id"].'">'.$row["question_desc"].'</option>';
            }
            ?>
            </select>
            </div>
            <div class="form-group">
                <select class="form-control" name = "subject_id">
                    <option>Select Subject</option>
            <?php
            $sql="SELECT id,subject FROM subject_master where status = 1 ";
            $res=mysqli_query($connection,$sql);
            if(!$res){
                die('Could not get data: ' . mysqli_error($connection));
            }
            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                echo '<option value = "'.$row["id"].'">'.$row["subject"].'</option>';
            }
            ?>
            </select>
            </div>

            
            <div class="form-group" >
                <div id="ans-values">
                    <input  type="text" placeholder="Enter the option value.." name="option_value[]" class="form-control">
                    <br>

                    <select class="form-control" name="is_correct[]" >
                            <option value="">---Select the correct value---</option>
                            <option value="1">Correct</option>
                            <option value="0">In-Correct</option>
                        </select>
                        <br>
                        <select class="form-control" name="status[]" >
                    <option value="">---Select the Status---</option>
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                  </select>  
                    
                </div>
                <input type="button" class="add-row btn btn-primary" value="+">
            </div>
                      <?php // }?>
                    <input style="margin-left:425px;" type="submit" name="submit"  class="btn btn-primary">
                    
            </form>
            </div>
        
        <!-- </center> -->
            
</div>
<script type="text/javascript">
// For Adding and Deleting New Row start -----------------------------------------------------------
$(document).ready(function()
{  
    $(".add-row").click(function()
    {  
        var html = '<br><input  type="text" placeholder="Enter the option value.." name="option_value[]" class="form-control">';

        html += '<br><select class="form-control" name="is_correct[]" > <option >---Select the correct value---</option> <option value="1">Correct</option> <option value="0">In-Correct</option> </select>';

        html += '<br><select class="form-control" name="status[]" > <option >---Select the status---</option> <option value="1">Active</option> <option value="0">In-Active</option>  </select>';
     $('#ans-values').append(html);
    });

});

    </script>

</body>
</html>