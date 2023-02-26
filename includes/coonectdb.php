<?php 
 
    define("HOSTNAME","localhost");
    define("HOST_USER","root");
    define("HOST_PASS","");
    define("DB_NAME","admindash");
    
    $conn=mysqli_connect(HOSTNAME,HOST_USER,HOST_PASS,DB_NAME);
    
    
    if(!$conn){
        die("Connect faild :".mysqli_connect_error()."Error NO : ".mysqli_connect_errno());
    }else {
       // echo "Connected";
    }
?>