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
$subjectname = $_POST['subject_name'];
$semesterseason = $_POST['semester_name'];
$yeardate = $_POST['year_date'];



$sql104 = "SELECT id FROM person WHERE CONCAT(FN, '_', LN) LIKE ('%$fullname%') ORDER BY id DESC LIMIT 1 ;" ;
$row4 = mysqli_query($conn, $sql104);
$new_row = mysqli_fetch_assoc($row4);
$highest_id = $new_row['id'] ;

$sql105 = "SELECT id_subjects FROM subjects WHERE subject_name LIKE ('%$subjectname%') ORDER BY id_subjects DESC LIMIT 1 ;" ;
$row5 = mysqli_query($conn, $sql105);
$new_row5 = mysqli_fetch_assoc($row5);
$subject_id = $new_row5['id_subjects'] ;


$sql103 = "SELECT CONCAT(FN,'_', LN) AS full_name1 FROM person;";
$name = $conn->query($sql103);

// echo $fullname;
// echo $subjectname;
// echo $yeardate;
// echo $semesterseason;
// echo $highest_id;

if ($fullname != null) {
    if (
        !empty($fullname) && !empty($subjectname) && !empty($yeardate) && !empty($semesterseason)
    ) {

        $sql = "INSERT INTO students ( id_person, id_subject, full_name, subject_name, year_date, semester_season)
    VALUES ( $highest_id , $subject_id, '$fullname', '$subjectname', $yeardate, '$semesterseason' )";


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully \r\n";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        echo nl2br(" Subject Registered For Student \r\n");
    } else {
        if (empty($fullname)) {
            echo nl2br(" name missing \r\n");
        }
        if (empty($subjectname)) {
            echo nl2br(" Subject missing \r\n ");
        }
        if (empty($yeardate)) {
            echo nl2br(" year missing \r\n ");
        }
        if (empty($semesterseason)) {
            echo nl2br(" semester missing \r\n ");
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Students</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'connection.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML= response; 
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
            <div style="font-size: 20px;margin: 10px;color: #ead274; margin-left: 45px;"> REGISTER STUDENTS</div>

            <label for="full_name">Full Name</label><br>
            <td> <SELECT name="full_name">
                    <?php
                    while ($row = $name->fetch_assoc()) {
                        echo "<option value=" . $row["full_name1"] . ">" . $row["full_name1"] . "        
                            </option>";
                    }
                    ?>
                </SELECT></td>
            <br>
            <br>
           
            <div id="select_box">
            <label for="semester_name">Semester</label><br>
                <select name="semester_name" onchange="fetch_select(this.value);">
                <option>Select Semester</option>
                <?php
               $dbhost = 'localhost';
               $dbuser = 'root';
               $dbpass = '';
               mysqli_connect($dbhost, $dbuser, $dbpass);
               mysqli_select_db($conn, 'school_management_system');

                $select=mysqli_query($conn, "SELECT DISTINCT(semester) FROM subjects GROUP BY semester; ");
                while($row=mysqli_fetch_array($select))
                    {
                    echo "<option>".$row['semester']."</option>";
                     }
                    ?>
                </select>
                <br>
                <br>
                
                <label for="subject_name">Subjects</label><br>
                <select name = "subject_name" id="new_select">
                </select>
               
                            
            </div>   
            
            <br>
            <label for="year_date">Year</label><br>
            <td> <SELECT name="year_date">
                    <OPTION Value="2020">2020</OPTION>
                    <OPTION Value="2021">2021</OPTION>
                    <OPTION Value="2022">2022</OPTION>
                    <OPTION Value="2023">2023</OPTION>
                </SELECT> </td>
            <br>
            <br>


            <input id="button" type="submit" value="Add Student">
            <input id="button" type="submit" name="return" value="Return"><br><br>


        </form>
    </div>
</body>

</html>