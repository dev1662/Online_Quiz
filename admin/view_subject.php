<?php
include "../db_controller.php";
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
    <title>VIEW SUBJECT</title>
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
    text-align: left;
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
     body {
        background: rgba(0, 128, 0, 0.6);
        	 margin-top: 10px;
  /* margin-bottom: 100px;
  margin-right: 250px;
  margin-left: 200px; */
  font-family: Sans-serif;
     }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<?php include "dashboard.php";?>
<!-- <style>
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
       
</style>
<body>
<div class="dashboard">
        <table class="table">
            <tbody>
                <tr>
                    <td class="caption">
                        <b>
                            <b>
                                "Dashboard Admin-Pannel"
                            </b>
                        </b>
                    </td>
                </tr>
            </tbody>
        </table>
</div> -->
<br>

<div class="table2">
<label for="myInput2" class="search">

        <input style="margin-left:470px; border-radius:5px; border:2px solid #009879; padding-right:50px; padding-bottom:5px" type="text" id="myInput2" placeholder="Search...">
    </label>
    <table  align="center"class="styled-table" border="1">
                                <thead style="background-color: lightblue;">
                                    <tr >
                                        <th>Id</th>
                                        <th>Questions</th>
                                     <th>Status</th>
                                     <th>Action</th>

                                       
    
                                    </tr>
                                </thead>
                            <tbody id="myTable2">
                            <?php
                            include "../db_controller.php";
                            $query="SELECT * FROM subject_master";
        $select_users2=mysqli_query($connection, $query);
               while($row=mysqli_fetch_assoc($select_users2)){
                  $Users2_id = $row ['id'];
                  $subject = $row ['subject'];
                  $status=$row['status'];
    
     
    
                  echo "<tr class='active-row'>";
                  echo "<td style='background-color: lightblue;'>$Users2_id </td>";
                  echo "<td style='background-color: lightblue;'>$subject</td>";
                if($status==1){
                  echo "<td style='background-color: lightblue;' value='1'>Active</td>";
                }else{
                    echo "<td style='background-color: lightblue;' value='0'>In-Active</td>"; 
                }
                  echo "<td style='background-color: lightblue;'><center><a href='edit_subject.php?source=edit_users&edit_user={$Users2_id}'>Edit</a>";
                  if($status==1){
                  echo "<a href='view_subject.php?delete={$Users2_id}'>Delete</a>";
                  }
                 
                  echo "</center></td></tr>";
               }
                  if(isset($_GET['delete'])){
                    $the_users_id=$_GET['delete'];
                    $q1="UPDATE subject_master SET status=0 WHERE id=$the_users_id";
                    $delete_query=mysqli_query($connection,$q1);
                    if(!$delete_query){
                        die("Error in the query");
                    }
               }
             
               
               ?>
                            </tbody>
    </table>
</div>
<script>

$(document).ready(function(){
  $("#myInput2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>
</body>
</html>