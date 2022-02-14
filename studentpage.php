<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($conn);

    error_reporting(0);
    ini_set('display_errors', 0);

    if(isset($_POST['return'])) {
	    header("Location: index.php");
	    die;
}

$sql = "SELECT id_std, id_subj, student_grade, year_dates FROM student_grades  WHERE id_std = '$user_data[id_person]'; "; 
$result = $conn-> query($sql);

    ?>

<!DOCTYPE html>
<html>

<head>
    <title> Student Grade</title>
</head>

<body>
    

    <style type="text/css">
        
        body{
		background-image: url("Untitled.png");
	}
        #text {

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 97%;
            background-color: #ead274;
        }

        SELECT {

            height: 35px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
            background-color: #ead274;
        }


        #button {

            padding: 10px;
            width: 100px;
            background-color: #ead274;
            border: none;
            border-radius: 5px;
            margin-left: 100px;
        }

        #button:hover {
            opacity: 0.5;
            border: 1px solid blue;
        }

        #box {
          
            margin: auto;
            width: 300px;
            margin-top: 50px;
        }

        label {
            color: #ead274;
            margin: 3px;
        }

        table {
            table-layout: fixed;
            width: 100%;
    
        }

        td {
            border: 2px solid #ead274;
            text-align: center;
        }

        th {
            text-align: center;
            font-weight: bold;
        }

        td:hover {
            background-color: #ead274;
            color: white;
            cursor: pointer; 
        }

        h3 {
            text-align: center;
            color: #ead274;
        }

    </style>

    <div id="box">

     
            <div style="font-size: 20px;margin: 10px;color: #ead274; margin-left: 60px;"> STUDENT MARKS</div>
            <form method="post">
            <?php 

                echo "<h3>Username:$user_data[username]</h3>";

                echo "<table class= 'table1'>"; // start a table tag in the HTML ?>
                
                <tr class="row100 head">
									<th class="cell100 column1">Std Id</th>
									<th class="cell100 column2">Sbj Id</th>
									<th class="cell100 column3">Grade</th>
									<th class="cell100 column4">Year</th>
								</tr>
            <?php
                while ($row = $result->fetch_assoc()){ //Creates a loop to loop through results
                echo "<tr><td >" . $row['id_std'] .  
                "</td><td >" . $row['id_subj'] .
                "</td><td >" . $row['student_grade'] .  
                "</td><td >" . $row['year_dates'] . "</td></tr>";  
                //$row['index'] the index here is a field name
                }

                echo "</table>"; //Close the table in HTML

            ?>
            <br>

            <input id="button" type="submit" name="return" value="Return"><br><br>

            </form>
    
    </div>
</body>

</html>