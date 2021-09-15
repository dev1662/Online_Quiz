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
    <title>VIEW ANSWERS</title>
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

        <input style="margin-left:300px; border-radius:5px; border:2px solid #009879; padding-right:50px; padding-bottom:5px" type="text" id="myInput" placeholder="Search...">
    </label>
  <br>
    <table  align="center"class="styled-table" border="1">
                                <thead style="background-color: lightblue;">
                                    <tr >
                                        <th>id</th>
                                        <th>Questions</th>
                                        <th hidden>option_Id</th>
                                        
                                        <th >Answers</th>
                                        
                                     <th>Status</th>
                                     <th>Action</th>
                                       
    
                                    </tr>
                                </thead>
                            <tbody id="myTable">
                            <?php
                            include "../db_controller.php";
                            $query="SELECT  qom.question_id, qm.question_desc, qom.id, qom.option_value, qom.status FROM question_master as qm INNER JOIN question_option_mapping as qom ON qm.id=qom.question_id";
        $select_users2=mysqli_query($connection, $query);
               while($row=mysqli_fetch_assoc($select_users2)){
                //   $Users2_id = $row ['id'];
                  $id=$row['question_id'];
                  $Users2_Username = $row ['question_desc'];
                  $users=$row['id'];
                  $option=$row['option_value'];
                  
                  $status=$row['status'];
    
                
    
                  echo "<tr class='active-row'>";
                  echo "<td style='background-color: lightblue;'>$id </td>";
                  echo "<td style='background-color: lightblue;'>$Users2_Username</td>";
                  echo "<td hidden style='background-color: lightblue;'>$users ";
                
               
                  echo "<td style='background-color: lightblue;'>$option";
            
                echo "</td>";
                if($status==1){
                  echo "<td style='background-color: lightblue;' value='1' >Active</td>";
                }else{
                    echo "<td style='background-color: lightblue;' value='0' >In-Active</td>";

                }
                  echo "<td style='background-color: lightblue;'><center><a href='edit_answer.php?source=edit_users&edit_user={$users}'>Edit</a>";
                  if($status==1){
                  echo "<a href='view_answers.php?delete={$users}'>Delete</a>";
                  }
                  echo "</center></td></tr>";
    
               }
    
    
    
               if(isset($_GET['delete'])){
                $the_users_id=$_GET['delete'];
                $q1="UPDATE question_option_mapping SET status=0 WHERE id=$the_users_id";
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