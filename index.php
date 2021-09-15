<?php
include "db_controller.php";
session_start();
if(isset($_SESSION['id']))
{
    header("location: welcome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>| Online Quiz System |</title>
        <link rel="icon" href="image/title-home.jpg" >
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="shortcut icon" type="image/png" href="image/logo.png" />
        <style type="text/css">
            body {
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
        <center>
            <div class="intro">
                <h1> online quiz system </h1>
                <a href="login.php" class="btn"> LOGIN </a> &emsp;
                <a href="registeration.php" class="btn"> REGISTER </a>
                <h2> Good &nbsp;Luck. </h2>
            </div>
        </center>
</body>
</html>