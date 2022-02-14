<?php

session_start();
include_once("connection.php");
include_once("functions.php");

$user_data = check_login($conn);

error_reporting(0);
ini_set('display_errors', 0);

if(isset($_POST['return'])) {
	header("Location: admin.php");
	die;
}
	$subjectname = $_POST['subject_name'];
	$semester = $_POST['semester'];
		

   if ($subjectname != null){
	if (
		!empty($subjectname) && !empty($semester)
		) {
			
$sql = "INSERT INTO subjects (subject_name, semester)
VALUES ('$subjectname', '$semester' )";


if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
  } else {
	echo "Error: " . $sql . "<br>" . $conn->error;
  }
  header("Location: admin.php");
  die;
} else {
	if (empty($subjectname)) {
		echo nl2br(" Subject missing \r\n");
		
	}
	if (empty($semester)) {
		echo nl2br(" Semester missing \r\n ");
}
   }
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Register Subjects</title>
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
			margin-left: 30px;
		}

		#button:hover {
			opacity: 0.5;
			border: 1px solid blue;
		}

		#box {
            margin: auto;
			width: 300px;
			padding: 20px;
			padding-bottom: 5px;
			border-radius: 5px;
			margin-top: 100px;
		}

		label {
			color: #ead274;
			margin: 3px;
		}
	</style>

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: #ead274; margin-left: 45px;"> REGISTER SUBJECTS</div>

			<label for="subject_name">Subject Name</label>
			<input id="text" type="text" name="subject_name" placeholder="Subject Name"><br><br>

			<label for="semester">Semester</label><br>
			<td> <SELECT name = "semester">
                <OPTION  Value="Fall">FALL</OPTION>
                <OPTION  Value="Spring">SPRING</OPTION>
                <OPTION  Value="SummerI">SUMMER I</OPTION>
                <OPTION  Value="SummerII">SUMMER II</OPTION>
                </SELECT> </td>
				<br>
				<br>

			
			<input id="button" type="submit" value="Add Subject">
			<input id="button" type="submit" name = "return" value="Return"><br><br>

			
		</form>
	</div>
</body>

</html>
