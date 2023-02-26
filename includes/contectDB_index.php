<?php 
 
    define("HOSTNAME","localhost");
    define("HOST_USER","root");
    define("HOST_PASS","");
    define("DB_NAME","gym");
    
    $contect=mysqli_connect(HOSTNAME,HOST_USER,HOST_PASS,DB_NAME);
    
    
    if(!$contect){
        die("Connect faild :".mysqli_connect_error()."Error NO : ".mysqli_connect_errno());
    }else {
       // echo "Connected";
    }
?>