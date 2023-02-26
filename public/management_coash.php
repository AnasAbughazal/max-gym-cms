<?php


    session_start();

?>
<?php

include("../includes/layout/header.php");
include_once ('../includes/contectDB_index.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

login_check();


?>


  <body>
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
 <!-- Error show -->
<div class="container">
     <div class="row ">
        <div class="col-sm-3">    


		</div>
		<div class="col-sm-8">    

			<?php echo  msg();?>
			<?php $error=err();?>
			<?php error_function($error);?>
			
		</div>
	 </div>
</div>


 <div class="container">
     <div class="row ">
        

         <div class="col-sm-12 ">   
    	  	<div class=" panel-default ">
              <div class="panel-heading" style="background:#eee;">Create New Menu</div>
              		 <div class="panela">
              		  <form method="post" action="m_submet.php">
                          <div class="mb-3">
                            <label  class="form-label">Menu Name</label>
                            <input type="text" class="form-control" name="class" >
                          </div>
                          <div class="mb-3 panela">
                           <label class="form-label" style='font-weight:bold;'>Visable :  </label>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="optradio" value='1' >
                              <label class="form-check-label" for="inlineRadio1" > Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="optradio"  value='0' checked>
                              <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                          </div>
						  <label class="form-label" style="font-weight:bold;">Select Menu :</label>
                          <div class='panela'>
                          
                      <select class="form-select" aria-label="Default select example" name='rank'>
                          <?php 
                        		$query="SELECT `rank` FROM `class` ";
                        		$result=mysqli_query($contect,$query);
                        		
                        		$res_num=mysqli_num_rows($result);
                        		 //for($i=1;$i<=$res_num+1;$i++){ 
                        		?>
                        		
								 <option value="<?php echo $res_num+1;?>" id="select" name="select" style="font-size:15px;">
								 <?php echo $res_num+1;?></option>
                           				
                           <?php 
                         		//}
                        		mysqli_free_result($result);
                           ?>
                            </select>
                            </div>
                          <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                        </form>
                       </div>
              
            </div>
         </div>
</div>
</div>

 </body>

<?php
include("../includes/layout/footer.php");
?>