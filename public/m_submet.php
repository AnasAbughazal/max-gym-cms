<?php


    session_start();

?>
<?php


include_once ('../includes/contectDB_index.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

login_check();
if (isset($_POST['submit']))
{
    $class=check_length(check_Empty(check_input($_POST["class"])),20,4);
    $optradio=(int)$_POST["optradio"];
    $rank=(int)$_POST["rank"];
    $class2=mysqli_real_escape_string($contect,$class);
    
	
	if(!empty($error))//if is not error
	{
		$_SESSION['errors']=$error;
		redirect("management_coash.php");
	}
	
	
	
	
    $sql="INSERT INTO `class` (`name_class`, `rank`, `visible_class`) VALUES 
                                       ( '{$class}', '$rank', '$optradio')";

    $result=mysqli_query($contect,$sql);
    if($result && mysqli_affected_rows($contect) > 0)
    {
           $_SESSION['msg']=success_msg_menu();
           redirect("mange_content.php");
    }
    else{
        
            $_SESSION['msg']=error_msg_menu();
       
        redirect("management_coash.php");
    }
}else{
    redirect("management_coash.php");
}

?>