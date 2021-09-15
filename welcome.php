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
    <title>WELCOME</title>
    <link rel="icon" href="image/title-home.jpg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" >
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>
<style>
        #logout{
              margin-left: 1250px;
              margin-top: 25px;
        }
        body{
          width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
        }
        #logout a{
              color:white;
              
        }
        a{
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
        }
        body{
            background-color:cyan;
}
         


        .dropbtn { background-color: #4CAF50;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor:pointer;
          border-radius: 25px;
          }

          .dropbtn:hover, .dropbtn:focus {
            background-color: #3498DB;
          }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {

          display:none;
          position: relative; 
        }

        .dropdown-content a {

          background-color:#4CAF50;

          color:black;
          padding:  26px 50px ;
          text-decoration: none;
          display:block;
          border: none;
          cursor:pointer;
          font-size: 16px;
          }


          .dropdown-content a:hover {
          background-color:burlywood;
          }

          .show {display:block;}

    
        .dashboard .table{
            width: 100%;
            height: 100px;
            background-color: rgb(255, 255, 128);
        }
        .dashboard .caption{
            text-align: center;
            font-family:'Times New Roman', Times, serif;
            font-size: 40px;
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
                            <i class="glyphicon glyphicon-user"></i> 
                                "Welcome to the Quiz"
                                <!-- <a href="logout.php"><img src="image/OIP (2).jpg" alt=""></a> -->
                            </b>
                        </b>
                    </td>
                </tr>
            </tbody>
        </table>
</div>

<div id="logout">
      <a onClick="return confirm('Are you Sure want to logout?');" href="logout.php">LOGOUT</a>
    </div><br>
  <section>
    

    
    <div class="score">

      <a style=" margin-top:100px; margin-bottom:100px ; color:whitesmoke;" href="score.php">MY SCORE</a>
    </div>
    </section><br><br>
    <div class="dropdown">
        
          
          <button onclick="myFunction()" class="dropbtn">SUBJECTS</button>
          <div id= "myDropdown" class="dropdown-content">
          
          
    <?php
        $q="SELECT id,subject FROM subject_master WHERE status=1";
        $r=mysqli_query($connection,$q);
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
          echo "<a href='english.php?id=".$row ['id']."'>{$row ['subject']}</a> ";
        }
          ?>
     
    </div>
    
  </div>
          <script>
              function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
            }

        // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
          </script>
</body>
</html>