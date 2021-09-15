<?php
include "db_controller.php";
session_start();
if(!isset($_SESSION['id']))
{
    header("location: index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ COMPELETED</title>
    <link rel="icon" href="image/title-home.jpg" >
</head>
    <style>
        body{
          /* width: 100%; */
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
        } 
        .response {
           
        border:4px solid white;
        padding-bottom: 50px;
        margin-left: 50px;
        margin-right: 50px;
        border-radius: 12px;
        background-color: whitesmoke;
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
        a{
            border-radius: 25px;
          background: #73AD21;
          padding: 20px;
          /* width: 20px; */
          height: 0px;
          color:white;
          text-decoration: none;
          margin-left: 60px;
          
        }
        a:hover{
            background-color: brown;
            color:white;
        }
    </style>
<body>
<div class="dashboard">
        <table class="table">
            <tbody>
                <tr>
                    <td class="caption">
                        <b>
                            <b>
                                Welcome to the Quiz
                            </b>
                        </b>
                    </td>
                </tr>
            </tbody>
        </table>
</div><br><br>

<div class="home">

    <a href="welcome.php" class="button">HOME</a>
    <a onClick="return confirm('Are you Sure want to logout?');" href="logout.php">LOGOUT</a>
    <a href="score.php">MY SCORE</a>
</div><br><br>

        <div  style="text-align:center; font-size:60px; color:cadetblue;" class="response">
            Thanks for Playing the quiz.....<br>

            <?php 
            // $q="Select * from score where student_id=".$_SESSION['id']." ";
            // $r=mysqli_query($connection,$q);
            // while($row=mysqli_fetch_array($r, MYSQLI_ASSOC)){
            //     $score=$row['total_marks'];
            //     echo "Your score is $score ";
            //     break;
            // }
        ?>
        </div>
        

</body>
</html>