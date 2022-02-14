<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);

	
	if(isset($_POST['button5'])) {
		header("Location: studentpage.php");
		die;
	}
	if(isset($_POST['button6'])) {
		header("Location: logout.php");
		die;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Page</title>
</head>
<body>
<style type="text/css">

body{
		background-image: url("Untitled.png");
	}

	h2 {
		text-align:center;
	}
		#text {

			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {
			
			padding: 10px;
			width: 150px;
			background-color: #ead274;
			font-weight: bold;
			border: none;
			border-radius: 5px;
			height: 100px;
			
		}

		#button1 {
			
			padding: 10px;
			width: 150px;
			background-color: #ead274;;
			font-weight: bold;
			border: none;
			border-radius: 5px;
			height: 100px;
			
		}

		#button:hover {
			opacity: 0.5;
			border: 1px solid blue;
		}

		#button1:hover {
			opacity: 0.5;
			border: 1px solid blue;
		}

	
		#flex-container {
			
			display:flex;
			flex-wrap: wrap;
			text-align: center;
			box-sizing: border-box;
			
			margin: auto;
			margin-top: 100px;
			margin-left: 550px;
			width: 500px;
			padding: 20px;
			border-radius: 5px;
			
		}

		.flex-item-left {
	
		flex:45%;
		padding: 10px;	
		}

	</style>



<form method="POST">

<div style="font-size: 30px; margin-top:50px; margin-left: 660px; color: #ead274;">STUDENT PAGE</div>
<div id = "flex-container"> 

<div class="flex-item-left" >
<input id="button1" type="submit" name="button5" value="My Marks"/>
</div>
<div class="flex-item-left" >
<input id="button1" type="submit" name="button6" value="Logout"/>
</div>

</div>

</form>

<br>


	
	
</body>
</html>