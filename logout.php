<?php

session_start();

if(isset($_SESSION['id_person']))
{
	unset($_SESSION['id_person']);

}

header("Location: login.php");
die;

?>