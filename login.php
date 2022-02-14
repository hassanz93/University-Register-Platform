<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$errorusername = "";
		$errorempty ="";

		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$sql4 = "SELECT * FROM login_page WHERE username = '$user_name' AND pass_word = '$password'  limit 1";
			$result = mysqli_query($conn, $sql4);
			
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass_word'] === $password)
					{
                        if ($user_data['page_role'] == 0) {
							$_SESSION['id_person'] = $user_data['id_person'];
							header("Location: index.php");
							die;
							}
						else if ($user_data['page_role'] == 1) {
							$_SESSION['id_person'] = $user_data['id_person'];
							header("Location: admin.php");
							die;	
						}
						
					}
				}
			}
			if(!empty($user_name) && !empty($password)){
			echo $errorusername = 'wrong username or password!';}
		}else
		{
			echo $errorempty = 'empty username or password!';
		}
	}
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	body{
		background-image: url("Untitled.png");
	}
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
		background-color: #ead274;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: #ead274;
		border: none;
	}

	#box{

		display: flex;
		flex-wrap:wrap;     
		justify-content: center;
		align-items:center ; 
		width: 300px;
		padding: 20px;
		margin-top: 200px;
		margin-left: 600px;
	}

	label {
			color: #ead274;
			margin: 3px;
		}
	</style>

	</style>

	<div id="box">
		
	   
		<form method="POST" action="">
			<div style="font-size: 20px;margin: 10px;color: #ead274;">Login</div>
             
			<label for="user_name">Enter User Name</label>
			<input id="text" type="text" name="user_name"><br><br>

			<label for="password">Enter Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			</div>
           
			
		</form>
	
</body>
</html>