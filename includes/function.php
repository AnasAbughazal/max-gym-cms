

<?php 

$error=array();

function redirect($url)
{
    header("location:".$url);
    exit();
}
function login_check()
{
	if (!isset($_SESSION['admin_id']))
	{
		redirect("login2.php");
	}
}

function success_msg_menu()
{
	
     $msg = "<div class='alert alert-info alert-dismissible' >";
     
     $msg.= "<strong >Success!</strong>New Record Created successfully.";
     $msg.= "</div>";
    return $msg;
}
    
function error_msg_menu()//Show error if result not good
{
    $msg= "<div class='alert alert-danger alert-dismissible' >";
    $msg.= "<strong>Wrong!</strong>Error ";
    $msg.= "</div>";
    return $msg;
}

function success_msg_login()
{
	
     $msg = "<div class='alert alert-info alert-dismissible' >";
     
     $msg.= "<strong >Success! </strong>WELCOME BACK ".$_SESSION['admin_username'];
     $msg.= "</div>";
    return $msg;
}
    
function error_msg_login()//Show error if result not good
{
    $msg= "<div class='alert alert-danger alert-dismissible' style='color:white;text-align:center;' >";
    $msg.= "<strong style='color:red;'>Wrong! <br></strong > Error login Verify username or password <br>";
    $msg.= "</div>";
    return $msg;
    
}
       


function check_input($data)
{
	$data=str_replace("_"," ",$data);
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	$data=ucfirst($data);
	return $data; 	
}

function check_length($data,$max,$min)
{
	global $error;
	if (strlen($data) < $min)
	{
		$error["too short"]="input is too short,miimum is 12 characters (20 max)";
	}
	elseif(strlen($data) > $max)
	{
		$error["too long"]="input is too long,miimum is 20 characters ";
	}
	else 
	{
		return $data;
	}
}

function check_Empty($data)
{
	global $error;
	$data = trim($data);
	if (isset($data)=== true && $data==='')
	{
		$error['empty']="empty field";
	}else{
		return $data;
	}
	
}


function error_function($error = array())
{
	
	if(!empty($error))
	{
		foreach($error as $key => $value)
		{
			echo "<div class='alert alert-danger alert-dismissible' >";
			echo "<strong>Wrong!</strong> {$key} => {$value}";
			echo "</div>";
			
		}
	}
}
//error_function($error);
?>	   