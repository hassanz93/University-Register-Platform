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

			$FN = $_POST['FN'];
			$LN = $_POST['LN'];
			$username = $_POST['username'];
			$Email = $_POST['Email'];
			$Phone = $_POST['Phone'];
			$Address = $_POST['Address'];
			$Major = $_POST['Major'];
			$password = $_POST['password'];
			$password_conf = $_POST['password_conf'];

			$duplicate=mysqli_query($conn,"SELECT * FROM login_page JOIN person WHERE username='$username' or Email='$Email'");

   if ($LN != null){
	if (
		!empty($FN) && !empty($LN) && !empty($username)
		&& !empty($Email) && !empty($Phone) && !empty($Address) && !empty($password) && !empty($password_conf) 
		&& ($password == $password_conf) && filter_var('Email', FILTER_VALIDATE_EMAIL) && mysqli_num_rows($duplicate)==0
		) {
			
$sql = "INSERT INTO person (FN, LN, Phone, City, Email, Major)
VALUES ('$FN', '$LN', '$Phone' ,'$Address','$Email', '$Major')";

$result = "SELECT MAX(id) AS max FROM person;";
$row = $conn-> query($result);
$new_row = $row->fetch_assoc();
$highest_id = $new_row['max'] + 1;

$sql1 = "INSERT INTO login_page ( id_person, username, pass_word, page_role ) 
VALUES ( $highest_id, '$username', '$password', 0)";

if ($conn->query($sql) === TRUE) {
  echo "Registered New Student";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($conn->query($sql1) === TRUE) {

  } else {
	echo "Error: " . $sql1 . "<br>" . $conn->error;
  }

} else {
	if (empty($FN)) {
		echo nl2br(" first name missing \r\n");	
	}
	if (empty($LN)) {
		echo nl2br(" last name missing \r\n ");
	}
	if (empty($username)) {
		echo nl2br(" user name missing \r\n");
	}
	if (empty($Email)) {
		echo nl2br(" Email missing \r\n");
	}
	if (mysqli_num_rows($duplicate)>0){
		echo nl2br("Email or Username already used \r\n");
	}
	if(!filter_var('Email', FILTER_VALIDATE_EMAIL)) {
        echo nl2br("Please enter a proper email \r\n");
	}
	if (empty($password)) {
		echo nl2br(" password missing \r\n");
	}
	if (empty($password_conf)) {
		echo (" password confirmation missing \r\n ");
	}
	else echo "password don't match"; 
}
   }
?>


<!DOCTYPE html>
<html>

<head>
	<title>Register Account</title>
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
		}

		label {
			color: #ead274;
			margin: 3px;
		}

		SELECT {
			height: 35px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 102%;
			background-color: #ead274;
			}

	</style>

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: #ead274; margin-left: 40px;">REGISTER ACCOUNTS</div>

			<label for="FN">Enter First Name</label>
			<input id="text" type="text" name="FN" placeholder="First name"><br><br>
			<label for="LN">Enter Last Name</label>
			<input id="text" type="text" name="LN" placeholder="Last name"><br><br>

			<label for="username">Enter User Name</label>
			<input id="text" type="text" name="username" placeholder="User name"><br><br>

			<label for="Email">Enter Email</label>
			<input id="text" type="text" name="Email" placeholder="Email"><br><br>
			<label for="Phone">Enter Phone Number</label>
			<input id="text" type="text" name="Phone" placeholder="Phone"><br><br>
			<label for="Address">Enter Address</label>
			<input id="text" type="text" name="Address" placeholder="Address"><br><br>

			<label for="Major">Major</label><br>
			<td> <SELECT name = "Major">
				<OPTION  Value="Architect">Architect</OPTION>
				<OPTION  Value="Civil Engineer">Civil Engineer</OPTION>
				<OPTION  Value="Electrical Engineer">Electrical Engineer</OPTION>
				<OPTION  Value="Mechanical Engineer">Mechanical Engineer</OPTION>
				<OPTION  Value="Mechatronics">Mechatronics</OPTION>
                <OPTION  Value="Software Engineer">Software Engineer</OPTION>
                </SELECT> </td>
				<br>
				<br>

			<label for="password">Enter password</label>
			<input id="text" type="password" name="password" placeholder="Enter Password"><br><br>
			<label for="password_conf">Confirm Password</label>
			<input id="text" type="password" name="password_conf" placeholder="Confirm Password"><br><br>


			<input id="button" type="submit" value="Signup">
			<input id="button" type="submit" name = "return" value="Return"><br><br>

			
		</form>
	</div>
</body>

</html>
