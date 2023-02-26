
<?php 

function msg()
{
	if (isset($_SESSION['msg']))
	{
		$mssg=$_SESSION['msg'];
		$_SESSION['msg']=null;
		return $mssg;
	}
	
}
/*function user()
{
	if (isset($_SESSION['user']))
	{
		$mssg=$_SESSION['user'];
		//$_SESSION['user']=null;
		return $mssg;
	}
	
}*/

function err()
{
	if (isset($_SESSION['errors']))
	{
		$mssg=$_SESSION['errors'];
		$_SESSION['errors']=null;
		return $mssg;
	}
	
}
?>