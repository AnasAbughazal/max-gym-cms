<?php session_start();?>
<?php

include_once ('../includes/coonectdb.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

?>

<style>


</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <link rel="stylesheet" href="static/css/login2.css"/>
</head>
<body>
    <div class="box">
        
		<form action="submit_login.php" class="form" method="POST">
			
            <h2>
                Sign In
            </h2>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forot password?</a>
                <a href="#">SignUp</a>
            </div>
            <input type="submit" value="Login"  name="submit">
			
            
            
			
			<div class="row justify-content-center">
					<?php echo msg();?>
			</div>
		</form>
       
    </div>
    
</body>
</html>