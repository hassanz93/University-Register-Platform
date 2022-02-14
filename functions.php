<?php

function check_login($conn)   // check if user is login
{

	if(isset($_SESSION['id_person']))
	{

		$id1 = $_SESSION['id_person'];
		$sql1 = "SELECT * FROM `login_page` WHERE `id_person` = '$id1' limit 1";    // check database

		$result1 = mysqli_query($conn,$sql1);                             // 
		if($result1 && mysqli_num_rows($result1) > 0)
		{

			$user_data = mysqli_fetch_assoc($result1);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");  // redirect to new login page if not already logined
	die;                            

}
