<?php
    	$id=$_GET['id_std'];
	   
    	include('connection.php');
    	mysqli_query($conn,"DELETE FROM student_grades WHERE id_std =$id LIMIT 1 ");
    	header('location:allstudents.php');
    ?>