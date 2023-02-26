<?php session_start(); ?>
<?php

include_once ('../includes/function.php');
include_once ('../includes/session.php');



$_SESSION['admin_id']=NULL;
$_SESSION['admin_username']=NULL;

redirect("login2.php");

?>