<?php
   session_start();
			 
			if( $_SESSION['rid'])
			{
				echo "<br>"."your id is ".$_SESSION['rid']."<br>";
			}
			
			 else
  {
	?>
	   <script>
	     alert("you need to login to view this page");
		 window.open('../login.php','_self');
	   </script>
	<?php
  }

?>
<?php 

   include('header.php');
 
?>

  <br><br>1.<a href="addrecord.php" align="center">Click Here to add new record </a><br><br>
  2.<a href="deleterecord.php"  align="center">Click Here to delete record </a><br><br>
  3.<a href="updaterecord.php"  align="center">Click Here to update record </a><br><br>
  4.<a href="../logout.php"  align="center"> Click here to logoutBFY</a>
  
 
   <?php
    
   ?>
 
 
 
 
 
 
 