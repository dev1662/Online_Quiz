<?php
include "db_controller.php";
session_start();
if(!isset($_SESSION['id'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCORES</title>
    <link rel="icon" href="image/title-home.jpg" >
</head>
<style>
                body{
        
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                 } 
                 a{
                        border-radius: 25px;
                    background: #73AD21;
                    padding: 20px;
                    height: 0px;
                    color:white;
                    text-decoration: none;
                    margin-left: 60px;
          
                }
              a:hover{
                    background-color: brown;
                    color:white;
                    }
    .dashboard .table{
                    width: 100%;
                    height: 70px;
                    background-color: rgb(255, 255, 128);
        }
        .dashboard .caption{
                    text-align: center;
                    font-family:'Times New Roman', Times, serif;
                    font-size: 40px;
        }   
        .response {
           
                    border:4px solid white;
                    padding-bottom: 50px;
                    padding-top:10px;
                    margin-left: 100px;
                    margin-right: 100px;
                    border-radius: 12px;
                    background-color: whitesmoke;
                }
       .styled-table {
                    border-collapse: collapse;
                    font-size: 0.9em;
                    font-family: sans-serif;
                    min-width: 400px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    }
            .styled-table 
            thead tr {
                    background-color: #009879;
                    color: #ffffff;
                    text-align: center;
                    }
    .styled-table th,
    .styled-table td {
                    padding: 12px 15px;
                    }
        .styled-table 
        tbody tr {
                    border-bottom: 1px solid #dddddd;
                }

    .styled-table 
    tbody 
    tr:nth-of-type(even) 
                {
                    background-color: #f3f3f3;
                }

    .styled-table 
    tbody 
    tr:last-of-type
                {
                    border-bottom: 2px solid #009879;
                }
        .styled-table 
        tbody 
        tr.active-row {
                    font-weight: bold;
                    color: #009879;
                }
            input {
                    border: none;
                    box-sizing: border-box;
                    font-family: Helvetica;
                    font-size: 15px;
                    color: inherit;
                    background: whitesmoke;
                    outline-width: 0px;
	            }
	
            .search {
                    display: inline-block;
                    position: relative;
                        height: 35px;
                    width: 35px;

                    border-radius: 25px;
                    cursor: text;
                }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
                <div class="dashboard">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="caption">
                                        <b>
                                            <b>
                                                Results of the Quiz
                                            </b>
                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div><br><br>
                <div class="home">
                    <a href="welcome.php">HOME</a>
                    <a onClick="return confirm('Are you Sure want to logout?');" href="logout.php">LOGOUT</a>
                    <a href="score.php">MY SCORE</a>

                </div><br><br>


                <div class="response">
                    <h1 align="center" style="color:black; border:2px solid white; border-radius:10px; background-color:yellow;  width:100%; font-size:65px;"><i>Rank List</i></h1>
                    <label for="myInput" class="search">
                    <input style="margin-left:120px; border-radius:5px; border:2px solid #009879; padding-right:50px; padding-bottom:5px" type="text" id="myInput" placeholder="Search...">

                    </label>
                    
            <table align="center" class="styled-table" border=1 >
                <thead  style="background-color: lightblue;">
                    <tr>
                        <th>Rank</th>
                        <th>First name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <!-- <th>Correct Answers</th> -->
                        <th>Scores</th>
                        <th>Date</th>
                    </tr>
                </thead>
                        <tbody id="myTable">
                    <?php
                    $q="SELECT  register.firstname, register.lastname, register.username, register.email, subject_master.subject ,  score.total_marks, score.date FROM register INNER JOIN score ON register.id=score.student_id INNER JOIN subject_master ON subject_master.id=score.subject_id  ORDER BY score.total_marks DESC ";
                    $dq=1;
                    
                    $result=mysqli_query($connection,$q);
                    while($row=mysqli_fetch_array($result)){
                        ?>
                            <tr class='active-row'>

                            <td style="background-color: lightblue;">
                                <?php 
                                // echo $dq;
                                // $dq++;
                                if($row['total_marks']==10){
                                    echo $dq=1;
                                }else if($row['total_marks']==9){

                                    
                                    echo $dq=2;

                                }else if($row['total_marks']==8){
                                   
                                    echo $dq=3;
                                }else if($row['total_marks']==7){
                                   
                                    echo $dq=4;

                                }else if($row['total_marks']==6){
                                    
                                    echo $dq=5;
                                }else if($row['total_marks']==5){
                                    
                                    echo $dq=6;
                                }else if($row['total_marks']==4){
                                    
                                    echo $dq=7;
                                }else if($row['total_marks']==3){
                                    
                                    echo  $dq=8;
                                }else if($row['total_marks']==2){
                                    
                                    echo $dq=9;
                                }else if($row['total_marks']==1){
                                   
                                    echo $dq=10;
                                }else{
                                    echo  $dq=11;
                                }

                                ?>
                                </td >

                            <td style="background-color: lightblue;">
                                <?php   echo "".$row['firstname']. "";
                                ?>
                                </td >
                            
                                    <td style="background-color: lightblue;">
                                <?php   echo "".$row['lastname']. "";
                                ?>
                                </td >
                                <td style="background-color: lightblue;">
                                <?php   echo "".$row['username']. "";
                                ?>
                                </td>
                                <td style="background-color: lightblue;">
                                <?php   echo "".$row['email']. "";
                                ?>
                                </td>
                                <td style="background-color: lightblue;">
                                <?php   echo "".$row['subject']. "";
                                ?>
                                </td>
                              
                                <td style="background-color: lightblue;">
                                    <?php
                                        echo "".$row['total_marks']."";
                                        ?>
                                    </td>
                                <td style="background-color: lightblue;">
                                    <?php
                                        echo "".$row['date']."";
                                        ?>
                                        
                <?php }
                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                        
                            
            </div>
            <script>
                        $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                    });
            </script>
</body>
</html>