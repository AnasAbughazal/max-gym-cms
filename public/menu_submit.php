<?php


    session_start();

?>
<?php

include("../includes/layout/header.php");
include_once ('../includes/coonectdb.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

login_check();
if (isset($_POST['submit']))
{
    $menu=check_length(check_Empty(check_input($_POST["menu"])),20,4);
    $optradio=(int)$_POST["optradio"];
    $rank=(int)$_POST["rank"];
    $menu2=mysqli_real_escape_string($conn,$menu);
    
	
	if(!empty($error))//if is not error
	{
		$_SESSION['errors']=$error;
		redirect("create_menu.php");
	}
	
	
	
	
    $sql="INSERT INTO `website_navbar` (`item_name`, `rank`, `visible`) VALUES 
                                       ( '{$menu}', '$rank', '$optradio')";

    $result=mysqli_query($conn,$sql);
    if($result && mysqli_affected_rows($conn) > 0)
    {
           $_SESSION['msg']=success_msg_menu();
           redirect("mange_content.php");
    }
    else{
        
            $_SESSION['msg']=error_msg_menu();
       
        redirect("create_menu.php");
    }
}else{
    redirect("create_menu.php");
}

?>