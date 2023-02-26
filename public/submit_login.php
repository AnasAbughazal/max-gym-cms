<?php session_start();?>
<?php

include("../includes/layout/header.php");
include_once ('../includes/coonectdb.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

if(empty($error))//if is not error
	{
		if (isset($_POST['submit']))
		{
			$username=check_length(check_Empty(check_input($_POST["username"])),20,4);
			$password=check_length(check_Empty(check_input($_POST["password"])),20,4);	
			
			$username1=mysqli_real_escape_string($conn,$username);
			$password1=mysqli_real_escape_string($conn,$password);
			
					//$sql="SELECT `username`,`password` FROM `admins` WHERE ";
					$sql="SELECT `id`,`username`, `password` FROM `admins` WHERE `username`='$username' LIMIT 1";
					$result=mysqli_query($conn,$sql);
				
					$row=mysqli_fetch_assoc($result);
				  if($result && mysqli_affected_rows($conn)> 0)
				  {
						$_SESSION['admin_id']=$row["id"];
						$_SESSION['admin_username']=$row["username"];

					  if($password == $row["password"])
					  {
						 $_SESSION['msg']=success_msg_login();
						 //$_SESSION['user']=$username;
						redirect("admin.php");
				   
					  }else
					  {
						 $_SESSION['msg']=error_msg_login();
						  
						redirect("login2.php");
					  }
				  }else{
						$_SESSION['msg']=error_msg_login();
						redirect("login2.php");
				  }		  
		}else{

						redirect("login2.php");
		}
	}



?>