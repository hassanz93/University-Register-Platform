<?php
// start connection with database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "school_management_system";
$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if(isset($_POST['get_option']))
{

$subjectn = $_POST['get_option'];
 $find= mysqli_query($conn, "SELECT subject_name FROM subjects WHERE semester = '$subjectn';");
 while($row=mysqli_fetch_array($find))
 {
  echo "<option>".$row['subject_name']."</option>";
 }
 exit;
}

if(isset($_POST['get_option1']))
{

$subjectn1 = $_POST['get_option1'];
 $find1= mysqli_query($conn, "SELECT DISTINCT(subject_name) FROM students WHERE full_name = '$subjectn1' ORDER BY subject_name ;");
 while($row1=mysqli_fetch_array($find1))
 {
  echo "<option>".$row1['subject_name']."</option>";
 }
 exit;
}

if(isset($_POST['get_option2']))
{

$subjectn2 = $_POST['get_option2'];
$find2= mysqli_query($conn, "SELECT DISTINCT(year_date) FROM students WHERE full_name = '$subjectn2' ORDER BY year_date;");
 while($row3=mysqli_fetch_array($find2))
 {
  echo "<option>".$row3['year_date']."</option>";
 }
 exit;
}

if($conn ->connect_error)
{

	die("failed to connect!" .$conn->connect_error);
}


?>