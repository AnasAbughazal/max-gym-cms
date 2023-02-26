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

       <!-- msg -->
       
 <div class="container">
     <div class="row " style='margin:20px;'>
        <div class="col-sm-3">    
		</div>
		<div class="col-sm-8">    
			<?php echo  msg();?>
		</div>
	 </div>
</div>
 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	


 <div class="container">
     <div class="row ">
     
     <!-- Menu an Page Tools -->
        <div class="col-sm-3 ">   
            <div class="panel accordion-item " id="collapseOne">
           		 <div class="accordion-body">
             	 </div>
            </div>         
		</div>
         <div class="col-sm-8 ">   
    	  	<div class="panela panel-defaultt">
              <div class="panel-heading">
				<p>Menu an Page Tools</p>
			  </div>
              		 <div class="panela">
        				<a type="button" class="btn btn-danger btn-lg" href="create_menu.php">
        					<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Create New Menu
        				</a>
						<a type="button" class="btn btn-danger btn-lg" href="create_menu.php">
        					<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Show Coach
        				</a>
						<a type="button" class="btn btn-danger btn-lg" href="create_menu.php">
        					<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Show Trained
        				</a>
						<hr>
						<?php$query="SELECT * FROM `website_navbar`";
						   $result=mysqli_query($conn,$query);
						   $row = mysqli_fetch_assoc($result)
						   ?>
						<a type="button" class="btn btn-danger btn-lg" href="#"><!--?menu=<?php echo $row["id"];?>--> 
        					<span class="glyphicon glyphicon-list" ></span> Create New class
        				</a>
						</div>
         </div>
		</div>
	</div>

<br>
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
		<button class="accordion accordion-button"  data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
		
		<?php echo  mysqli_real_escape_string($conn,$row['item_name'])." (".mysqli_real_escape_string($conn,$row['id']).")"  ?></button>
	
            <div class="panel accordion-item " id="collapseOne">
            <div class="accordion-body">
              <a href='mange_content.php?menu=<?php echo  mysqli_real_escape_string($conn,$row['id'])?>'>
              
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
                          
                            echo "<li><a href='mange_content.php?page=".mysqli_real_escape_string($conn,$rowNew['id'])."'>".mysqli_real_escape_string($conn,$rowNew['page_name'])."</a></li>";
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
    	  	<div class="panela panel-defaultt">
              <div class="panel-heading">
              
              <?php 
              if($menu_id_selected)
              {
                  $query="SELECT * FROM `website_navbar` WHERE id =".$menu_id_selected;
                  $result=mysqli_query($conn,$query);
                  
                  if(mysqli_num_rows($result)>0)
                  {
                      while ($row = mysqli_fetch_assoc($result))
                      {
                          echo $row['item_name'];
                      }
                  }
              }else if($page_id_selected)
              {
                  $query="SELECT * FROM `pages` WHERE id =".$page_id_selected;
                  $result=mysqli_query($conn,$query);
                  
                  if(mysqli_num_rows($result)>0)
                  {
                      while ($row = mysqli_fetch_assoc($result))
                      {
                          echo $row['page_name'];
                 
              ?>	
			  </div>
              		 <div class="panela">
			<?php 
				
                          echo $row['content'];
                      }
                  }
              }
              
              ?>


					</div>
              
            </div>
         </div>
</div>


</div>


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 </body>

<?php
include("../includes/layout/footer.php");
?>