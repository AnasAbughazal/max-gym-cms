<?php


    session_start();

?>
<?php

include("../includes/layout/header.php");
include_once ('../includes/coonectdb.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

login_check();
if(isset($_GET["menu"]))
{
    $menu_id_selected=$_GET["menu"];
    $page_id_selected=null;
}else if (isset($_GET["page"])){
    $menu_id_selected=null;
    $page_id_selected=$_GET["page"];
}
else {
    $menu_id_selected=null;
    $page_id_selected=null;
}

?>


  <body>
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#" class="active" >Logo</a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
      <?php 
           
           $query="SELECT * FROM `website_navbar`";
           $result=mysqli_query($conn,$query);
           
           if(mysqli_num_rows($result)>0)
           {
              echo "<ul>";
                 while ($row = mysqli_fetch_assoc($result)) 
                 {
                    
                     echo"<li> <a href='mange_content.php?menu=".mysqli_real_escape_string($conn,$row['id'])."'>" .mysqli_real_escape_string($conn,$row['item_name']). " </a></li>";
                     
                     $queryNew="SELECT * FROM `pages` WHERE  `pages`.`id_item`=".$row["id"];
                     $resultNew=mysqli_query($conn,$queryNew);
                     
                     if (mysqli_num_rows($resultNew)>0)
                     { echo "<ul>";
                         while ($rowNew = mysqli_fetch_assoc($resultNew)) 
                         {   
                             echo "<li><a href='mange_content.php?page=".mysqli_real_escape_string($conn,$row['id'])."'>".mysqli_real_escape_string($conn,$rowNew['page_name'])."</a></li>";
                         
                         }  
                         echo "</ul>";
                     }
                     }
                     echo "</ul>";
            }
            mysqli_free_result($result);
            
             ?>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

         
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
        <div class="col-sm-3 ">    

		<?php 
		$query="SELECT * FROM `website_navbar` ";
		$result=mysqli_query($conn,$query);
		
		if(mysqli_num_rows($result)>0)
		{
		    while ($row = mysqli_fetch_assoc($result))
		    {
		?>
		<button class="accordion accordion-button " style="margin:5px;background:#91E0FF;"  data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
		
		<?php echo  mysqli_real_escape_string($conn,$row['item_name'])." (".mysqli_real_escape_string($conn,$row['id']).")"  ?></button>
	
            <div class="panel accordion-item " id="collapseOne" >
            <div class="accordion-body">
              <a href='#?menu=<?php echo  mysqli_real_escape_string($conn,$row['id'])?>'>
              
              <?php echo  mysqli_real_escape_string($conn,$row['item_name']) ?>
              
              </a>
              
              <p>
               <?php  
               $queryNew="SELECT * FROM `pages` WHERE `pages`.`id_item`=".mysqli_real_escape_string($conn,$row['id']);
                $resultNew=mysqli_query($conn,$queryNew);
                  echo "<ol>";
              
                if (mysqli_num_rows($resultNew) > 0)
                {     
                        while ($rowNew = mysqli_fetch_assoc($resultNew))
                        { 
                          
                            echo "<li><a href='#?page=".mysqli_real_escape_string($conn,$rowNew['id'])."'>".mysqli_real_escape_string($conn,$rowNew['page_name'])."</a></li>";
                        }
                }  
              
                echo "</ol>";
              ?>
              </p>
              </div>
            </div>
            
            <?php 
		    }
		}
		mysqli_free_result($result);
            ?>
            
		</div>

         <div class="col-sm-8 ">   
    	  	<div class=" panel-default ">
              <div class="panel-heading" style="background:#eee;">Create New Menu</div>
              		 <div class="panela">
              		  <form method="post" action="menu_submit.php">
                          <div class="mb-3">
                            <label  class="form-label">Menu Name</label>
                            <input type="text" class="form-control" name="menu" >
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
                          <div class='panela'>
                           <lable class="form-label" style="font-weight:bold;">Select Menu :</lable>
                      <select class="form-select" aria-label="Default select example" name='rank'>
                          <?php 
                        		$query="SELECT rank FROM `website_navbar`";
                        		$result=mysqli_query($conn,$query);
                        		
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