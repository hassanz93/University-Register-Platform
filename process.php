<?php 

require_once("connection.php");
require_once("functions.php");
session_start();

	

	if(isset($_POST['Login']))
    {
       if(empty($_POST['username']) || empty($_POST['pass_word']))
       {
			header("location:login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $sql4="SELECT * FROM login_page WHERE username ='".$_POST['username']."' ";
            $result4=mysqli_query($con,$sql4);
			

            if($_SESSION['username']=$_POST['username'])
            {
                $_SESSION['username']=$_POST['username'];
				
                header("Location:index.php");
                die;
            }
            else
            {
				header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
		
    }

	
?>