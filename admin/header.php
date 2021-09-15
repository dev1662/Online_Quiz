<?php
    include "../db_controller.php";
    session_start();
    if(!isset($_SESSION['id'])) {
    header("location: index.php");  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" >
	    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<style>
    
        a{
            /* background-color: white; */
            text-decoration: none;
        }
        a:hover{
            background-color: white;
            text-decoration: none;
        }
        body{
            background-color:cyan;
        }
        .dashboard .table{
            width: 100%;
            height: 70px;
            background-color: rgb(255, 255, 128);;
        }
        .dashboard .caption{
            text-align: center;
            font-family:'Times New Roman', Times, serif;
            font-size: 40px;
        }
        /* .dashboard2 .table{
            width: 100%;
            height: 70px;
            background-color: rgb(255, 255, 128);; 
        }
        .dashboard2 .caption{
            text-align: center;
            font-family:'Times New Roman', Times, serif;
            font-size: 40px;
        } */
        
        a{
            
            font-size: 20px;
            margin-left:10px;
            font-family:'Times New Roman', Times, serif;

        }
        .nav-bar a{
            border-radius: 5px;
            background-color:crimson;
            color:beige;
            padding-left: 5px;
            padding-right: 10px;
            margin-left: 30px;
        }
        .nav-bar a:hover{
            background-color:orange;
            color:blanchedalmond;
            padding-left: 10px;
            padding-right: 10px;

        }
        body {
                width: 100%;
                background: url(../image/admin-login.jpg) ;
                /* background: url(../image/admin.jpg) ; */
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
    
</style>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<body >

<div class="dashboard">
        <table class="table">
            <tbody>
                <tr>
                    <td class="caption">
                        <b>
                            <a style="background-color: rgb(255, 255, 128);" align="left" href="dashboard.php"><img src="../image/home.png" alt=""></a>&nbsp;
                            <b style="margin-bottom: 12px;">

                                "Dashboard Admin-Panel"  
                                
                            </b>
                            <a style="background-color: rgb(255, 255, 128);" href="change_pass.php">
							
                            <img src="../image/changes-prevent-icon.png" width="100" alt="">
                            </a>       
                            
                            <!-- <a href="change_pass.php">
                            <img src="../image/password.png" width="50" alt="">
                            </a>           -->

                            <a  style="background-color: rgb(255, 255, 128);" onClick="return confirm('Are you Sure want to logout?');" id="logout" href="logout.php"><img  src="../image/OIP (2).jpg" height="100"  alt=""></a>
                            
                        </b>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
<br>
            <center>

                <div  class="nav-bar">
                    <a  href="add_subject.php">ADD SUBJECT</a>
                    <a href="view_subject.php">VIEW SUBJECT</a>
                    <a href="add_question.php">ADD QUESTIONS</a>
                    <a href="view_questions.php">VIEW QUESTIONS</a>
                    <a href="view_answers.php">VIEW ANSWERS</a>
                    <a href="users.php">VIEW USERS</a>
            </center>

  
	  
      </body>
</html>