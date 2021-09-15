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
    <title>VIEW USERS</title>
    <link rel="icon" href="../image/title-home.jpg" >
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<?php include "dashboard.php";?>
<br>
    <label for="myInput" class="search">
    <input style="margin-left:400px; border-radius:5px; border:2px solid #009879; padding-right:50px; padding-bottom:5px" type="text" id="myInput" placeholder="Search...">


    </label>

    <table  align="center"class="styled-table" border="1">
                                <thead style="background-color: lightblue;">
                                    <tr >
                                        <th>Id</th>
                                        <th>First Name</th>
                                     <th>Last Name</th>
                                     <th>Username</th>
                                     <th>Email</th>
                                    
                                       
    
                                    </tr>
                                </thead>
                            <tbody id="myTable">
                            <?php
                            include "../db_controller.php";
                            $query="SELECT * FROM register";
                            $dq=1;
        $select_users2=mysqli_query($connection, $query);
               while($row=mysqli_fetch_assoc($select_users2)){
                //   $Users2_id = $row ['id'];
                  $firstname = $row ['firstname'];
                  $lastname=$row['lastname'];
                  $username=$row['username'];
                  $email=$row['email'];

     
    
                  echo "<tr class='active-row'>";
                  echo "<td style='background-color: lightblue;'>$dq</td>";
                  $dq++;
                  echo "<td style='background-color: lightblue;'>$firstname</td>";
                
                  echo "<td style='background-color: lightblue;' >$lastname</td>";
                  echo "<td style='background-color: lightblue;' >$username</td>";
                  echo "<td style='background-color: lightblue;' >$email</td>";

                //   echo "<td style='background-color: lightblue;'><a href='edit_question.php?source=edit_users&edit_user={$Users2_id}'>Edit</a></td>";
                //   echo "<td style='background-color: lightblue;'><a href='view_questions.php?delete={$Users2_id}'>Delete</a></td>";
    
                 
                  echo "</tr>";
    
               }?>
                            </tbody>
    </table>

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