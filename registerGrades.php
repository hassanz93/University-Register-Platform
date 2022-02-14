<?php

session_start();
include_once("connection.php");
include_once("functions.php");

$user_data = check_login($conn);

error_reporting(0);
ini_set('display_errors', 0);

if (isset($_POST['return'])) {
    header("Location: admin.php");
    die;
}

$fullname = $_POST['full_name'];
$subject = $_POST['subject_name'];
$subjectgrade = $_POST['subject_grade'];
$yeardate = $_POST['year_date'];


$sql1 = "SELECT id_person FROM students WHERE full_name = '$fullname' ORDER BY id_person DESC LIMIT 1 ;" ;
$row1 = mysqli_query($conn, $sql1);
$new_row = mysqli_fetch_assoc($row1);
$student_id = $new_row['id_person'] ;

$sql2 = "SELECT id_subject FROM students WHERE subject_name = '$subject' ORDER BY id_person DESC LIMIT 1 ;" ;
$row2 = mysqli_query($conn, $sql2);
$new_row = mysqli_fetch_assoc($row2);
$subject_id = $new_row['id_subject'] ;


if ($fullname != null) {
    if (
        !empty($fullname) && !empty($subject) && !empty($subjectgrade) 
    ) {

        $sql = "INSERT INTO student_grades ( id_std, id_subj, student_grade, year_dates)
    VALUES ( $student_id , $subject_id, $subjectgrade, $yeardate  )";


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: admin.php");
        die;
    } else {
        if (empty($full_name)) {
            echo nl2br(" name missing \r\n");
        }
        if (empty($subject)) {
            echo nl2br(" Subject missing \r\n ");
        }
        if (empty($subjectgrade)) {
            echo nl2br(" grade missing \r\n ");
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Grades</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'connection.php',
 data: {
  get_option1:val
 },
 success: function (response) {
  document.getElementById("new_select1").innerHTML= response; 
  
 }
 });

$.ajax({
 type: 'post',
 url: 'connection.php',
 data: {
  get_option2:val
 },
 success: function (response) {
  document.getElementById("new_select2").innerHTML= response; 
 }
 });
}

</script>
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
            display:flex;
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
            <div style="font-size: 20px;margin: 10px;color: #ead274; margin-left: 45px;"> REGISTER GRADES</div>

           
            <div id="select_box">
            <label for="full_name">Full Name</label><br>
                <select name="full_name" onchange="fetch_select(this.value);">
                <option>Select Name</option>
                <?php
               $dbhost = 'localhost';
               $dbuser = 'root';
               $dbpass = '';
               mysqli_connect($dbhost, $dbuser, $dbpass);
               mysqli_select_db($conn, 'school_management_system');

                $select1=mysqli_query($conn, "SELECT DISTINCT full_name FROM students; ");
                while($row=mysqli_fetch_array($select1))
                    {
                    echo "<option>".$row['full_name']."</option>";
                     }
                    ?>
                </select>
                <br>
                <br>
                
                <label for="subject_name">Subjects</label><br>
                <select name = "subject_name" id="new_select1">
                </select>

                <br>
                <br>
                
                <label for="year_date">Year</label><br>
                <select name = "year_date" id="new_select2">
                </select>
                                  
            </div> 
            <br>  

            <label for="subject_grade">Enter Grade</label>
			<input id="text" min="0" max="100" type="number" name="subject_grade" placeholder="Enter Grade"><br><br>

            <input id="button" type="submit" value="Add Student">
            <input id="button" type="submit" name="return" value="Return"><br><br>


        </form>
    </div>
</body>

</html>