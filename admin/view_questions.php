<?php
include("../db_controller.php");
// session_start();
// if(!isset($_SESSION['id'])) {
//     header("Location: index.php");  
//     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW QUESTION</title>
    <link rel="icon" href="../image/title-home.jpg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" >

</head>
<style>
    .styled-table {
    border-collapse: collapse;
    /* margin: 25px 0; */
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: center;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

    input {
		/* width: 100%; */
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
<!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
    <?php include "dashboard.php";?><br>
    
<div class="table2">
    <label for="myInput" class="search">

        <input style="margin-left:130px; border-radius:5px; border:2px solid #009879; padding-right:50px; padding-bottom:5px" type="text" id="myInput" placeholder="Search...">
    </label>
  <br>
    <table  align="center"class="styled-table" border="1">
                                <thead style="background-color: lightblue;">
                                    <tr >
                                        <th>Id</th>
                                        <th>Questions</th>
                                     <th>Status</th>
                                        <th>Action</th>
                                       
    
                                    </tr>
                                </thead>
                            <tbody id="myTable">
                            <?php
                            include "../db_controller.php";
                            $query="SELECT * FROM question_master";
        $select_users2=mysqli_query($connection, $query);
               while($row=mysqli_fetch_assoc($select_users2)){
                  $Users2_id = $row ['id'];
                  $Users2_Username = $row ['question_desc'];
                  
                  $status=$row['status'];
    
                
    
                  echo "<tr class='active-row'>";
                  echo "<td style='background-color: lightblue;'>$Users2_id </td>";
                  echo "<td style='background-color: lightblue;'>$Users2_Username</td>";
                if($status==1){
                  echo "<td style='background-color: lightblue;' value='1' >Active</td>";
                }else{
                    echo "<td style='background-color: lightblue;' value='0' >In-Active</td>";

                }
                  echo "<td style='background-color: lightblue;'><center><a href='edit_question.php?source=edit_users&edit_user={$Users2_id}'>Edit</a>";
                  if($status==1){
                  echo "<a href='view_questions.php?delete={$Users2_id}'>Delete</a>";
                  echo "<a href='add_answers.php?add={$Users2_id}'>Add Answers</a>";
                  }
                  echo "</center></td></tr>";
    
               }
    
    
    
               if(isset($_GET['delete'])){
                $the_users_id=$_GET['delete'];
                $q1="UPDATE question_master SET status=0 WHERE id=$the_users_id";
                $delete_query=mysqli_query($connection,$q1);
                if(!$delete_query){
                    die("Error in the query");
                }

            }
                
            
                
                // header("location:view_questions.php");
        
               
                  ?>
                                    
                                
                            </tbody>
                            </table>
    

</div>    
<?php
//     $q2="SELECT * FROM question master WHERE  status =1";
//     $res=mysqli_query($connection,$q2);
//     echo "<table border='1' style='overflow-x:auto;'>";
// echo "<tr><th> Id</th><th>Question</th><th>Delete</th><th>Edit</th></tr>";
// while($r=$res->fetch_array())
// {
//     $id=$r['id'];
//     $ques=$r['question_desc'];
    
// echo "<tr>";
// echo "<td>$id</td>";
// echo "<td>$ques</td>";
// echo "<td><a href='del_cat.php?id=$r[0]'>Delete</a></td>";
// echo "<td><a href='edit.php?id=$r[0]'>Edit</a></td>";
// echo "</tr>";
// }
// echo "</table>";

?>
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