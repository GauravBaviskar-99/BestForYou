<?php
  session_start();
  include('header.php');
?>
<?php
   if(isset($_SESSION['rid']))
	   
   {
	   echo "your current ID is ".$_SESSION['rid'];
   }
   else
   {
	   ?>
	     <script>
		    alert("You need to login first to view this page");
			window.open('../login.php','_self');
		 </script>
	   <?php
   }
?>

<?php
   $rid=$_GET['rid'];
   
     include('../dbcon.php');
	 
	  $qry="delete from resource where rid=$rid";
	  
	  $result=mysqli_query($con,$qry);
	  
	  if($result==true)
	  {
		  ?>
		     <script>
			    alert("Record is deleted successfully");
				window.open('deleterecord.php','_self');
			 </script>
		 
		 <?php
	  }
	  
	  else
	  {
		?>    
                   		<script>
                		alert("record deletion is failed");
		  				window.open('deleterecord.php','_self');
						</script>
						<?php
		
	  }
	  
?>