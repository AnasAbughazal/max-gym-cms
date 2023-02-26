<?php session_start()?>


<?php
include("../includes/layout/header.php");
include_once ('../includes/coonectdb.php');
include_once ('../includes/function.php');
include_once ('../includes/session.php');

login_check();
?>

  <body>
<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Top Navigation Menu -->
<div class="topnav">

  <a href="#" >Logo</a>
  <!-- Navigation links (hidden by default) -->
  
  <div id="myLinks">
  
      <?php /*
           
           $query="SELECT * FROM `website_navbar` WHERE  visible=1";
           $result=mysqli_query($conn,$query);
           
           if(mysqli_num_rows($result)>0)
           {
              echo "<ol>";
                 while ($row = mysqli_fetch_assoc($result)) 
                 {
                    
                     echo"<li>"." <a href='admin.php'> " .  $row['item_name']. " </a>"."</li>";
                     
                     $queryNew="SELECT * FROM `pages` WHERE visible=1 AND `pages`.`id_item`=".$row["id"];
                     $resultNew=mysqli_query($conn,$queryNew);
                     
                     if (mysqli_num_rows($resultNew)>0)
                     { echo "<ul>";
                         while ($rowNew = mysqli_fetch_assoc($resultNew)) 
                         {   
                             echo "<li>"."<a>"."<h6>".$rowNew['page_name']."</h6>"."</a>"."</li>";
                         
                         }  
                         echo "</ul>";
                     }
                     }
                     echo "</ol>";
            }
            mysqli_free_result($result);
            
             */?>
			 
			 
			 <div class="container">
			
					<div class="row ">
		 
						<div class="row col-sm-2 ">   
							<a class="btn btn-danger" type="button" href="logout.php">logout </a>
							
						</div>
						 <div class="col-sm-10 ">   
							<p style="color:white;"><?php echo htmlentities($_SESSION['admin_username']);?>  </p>
						</div>
				
					</div>
			</div>
			
			
			
			 
			 
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
	
        <section class="ftco-section">
		<div class="container">
			<!-- msg -->
			<div class="row justify-content-center" style="padding:20px;">
					<?php echo msg();?>
			
			</div>
			<div class="row justify-content-center">
        
              <div class="container theme-showcasae  bg-dark p-5 mb-9 rounded-3 ">
                  
                  	<div style='color:#fff;'>
                    <h1 class="display-5 fw-bold " >Admin Area</h1>
                    <p class="col-md-8 fs-4">Welcome to your <?php echo htmlentities($_SESSION['admin_username']);?> !</p>
                  	</div>
                  
                  
                    <a type="button" class="btn btn-danger" href='dashboard.php'>Mange Content</a>
                  
                    <a type="button" class="btn btn-primary" href='admin.php'>Admin</a>
                    <a type="button" class="btn btn-success" href='logout.php'>log out</a>
                </div>
      
       </div>
			
			
			
		</div>
	</section>
       

 
 
   <script>
   /* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
    function myFunction() {
      var x = document.getElementById("myLinks");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
   </script>


 </body>
<?php
include("../includes/layout/footer.php");
?>