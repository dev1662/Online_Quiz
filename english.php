<?php
include "db_controller.php";

session_start();
if(!isset($_SESSION['id']))
{
    header("location: index.php");
}
if(isset($_POST['Submit'])){
    if($_POST['subject'] != ''){
        try{
            $resultCount = mysqli_query($connection,"select * from question_option_mapping where status = 1 and subject_id = ".$_POST['subject']." group by question_id");
            //$sql="SELECT qm.id as question_id, qm.question_desc, qom.option_value,qom.subject_id,qom.id as option_id FROM question_master as qm INNER JOIN question_option_mapping as qom on qom.question_id = qm.id where qom.`status` = 1 and qom.subject_id = ".$_POST['subject'] ;
            $totalMarks = 0;
           while($row = mysqli_fetch_array($resultCount, MYSQLI_ASSOC)){
			    $i = $row["question_id"];
               if(isset($_POST['ans'.$i])){
                   
                    $ans = explode('/',$_POST['ans'.$i]); 
                    if($ans[1] == 1){
                        $totalMarks++;
                    }
                    $q="INSERT INTO marks (student_id, question_id, subject_id, option_id, is_correct, date) VALUES (".$_SESSION['id'].",".$_POST['Ques'.$i].",".$_POST['subject'].",".$ans[0].",".$ans[1].",NOW())";
                    $r=mysqli_query($connection,$q);
               }
           }
           $q="INSERT INTO score (student_id,date,subject_id,total_marks) VALUES (".$_SESSION['id'].",NOW(),".$_POST['subject'].",".$totalMarks.")";
               $r=mysqli_query($connection,$q);
        }
        catch(Exception $e){
            echo "<script>alert('".$e->getMessage()."')</script>";
        }
        
        header("Location: check.php");
    }
    else{
        echo "<script>alert('Subject is invalid...')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.C.Q Paper</title>
    <link rel="icon" href="image/title-home.jpg" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<style>
     body{
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
        }
    body{
        	 margin-top: 50px;
  margin-right: 150px;
  margin-left: 150px;
  font-family: Sans-serif;
	 
}
a{
            border-radius: 25px;
          background: #73AD21;
          padding: 20px;
          height: 50px;
          color:white;
          text-decoration: none;
          margin-left: 60px;
          
        }
        a:hover{
            background-color: brown;
            color:white;
        }
        
      
        .form {
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
        /* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: 165px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
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
</div><br>

<div class="home">

    <a href="welcome.php" class="button">HOME</a>
    <a onClick="return confirm('Are you Sure want to logout?');" href="logout.php">LOGOUT</a>
    <a href="score.php">MY SCORE</a>

</div><br>

    <div class="form">


        <?php
            if(isset($_GET['id'])){
                $id=mysqli_real_escape_string($connection,$_GET['id']);
            $res2=mysqli_query($connection,"SELECT subject FROM subject_master WHERE id=$id");
            if(!$res2){
                die('Could not get data: ' . mysqli_error($connection));
            }?><?php
            while($row = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
                echo "<h1 align='center' style='color:green;'><strong><u>{$row['subject']} M.C.Q Paper</u></strong></h1>";
            }
        }
                ?><br>
				
		 <div class="slideshow-container">
  		
	
            <?php
	//		for($qm_id=1;$qm_id<11;$qm_id++){
        ?> 
            

        <?php
        $sql="SELECT qm.id as question_id, qm.question_desc, qom.option_value,qom.subject_id,qom.id as option_id,qom.is_correct FROM question_master as qm INNER JOIN question_option_mapping as qom on qom.question_id = qm.id where qm.`status` = 1 and qom.`status` = 1 and qom.subject_id = ".$_GET['id'];
        $res=mysqli_query($connection,$sql);
        if(!$res){
            die('Could not get data: ' . mysqli_error($connection));
        }
        $sqlCount="SELECT qm.id FROM question_master as qm INNER JOIN question_option_mapping as qom on qom.question_id = qm.id where qm.`status` = 1 and qom.`status` = 1 and qom.subject_id = ".$_GET['id']." GROUP BY qom.question_id";
        $resCount=mysqli_query($connection,$sqlCount);
        $resRowCount = mysqli_num_rows($resCount);
        ?>
        
        
        
        <form method="post" enctype="multipart/form-data" >
        <?php
        
        $qusno = $id = 0;
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            
                ?>
            <!-- Full-width images with number and caption text -->
                <?php
                      
                if($id != $row['question_id']){
                    ?>
                        <?php
                     
                        if($qusno != 0){
                        ?>
                        </div>
                        <div class="mySlides ">
                        <?php
                     
                    }else{
                        echo '<div class="mySlides ">';
                    }
                    $qusno++;
                    $id = $row['question_id'];
                    $ques = $row['question_desc'];
                    echo " <strong style='color:green;'><u>Question   ".$qusno.
                    " :</u></strong> {$row['question_desc']} <br> ";
            
                }
                    echo "<input type='hidden' name='Ques".$row['question_id']."' value='".$row['question_id']."' >";
                    echo "<input type='hidden' name='subject' value='".$row['subject_id']."' ><br>";
                    echo "<label  for='ans".$row['question_id']."'>";
                    echo "<input type='radio' name='ans".$row['question_id']."' value='".$row['option_id']."/".$row['is_correct']."' >".$row['option_value']."<br></label>";
                    echo "<br>"; ?>
                    
        <?php         }
        ?>
        </div>
    <!-- Next and previous buttons -->

            <center>
      
                  <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
            </center>
            
            <a class="prev" onclick="plusSlides(-1)">Previous</a>
      <a class="next" onclick="plusSlides(1)">Next</a>     
    
        </form>
        
        
</div>

<br>
<span class ="dot" style = "display:none"><?php echo $resRowCount; ?></span>
<!-- The dots/circles -->
<!-- <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> -->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>

</html>