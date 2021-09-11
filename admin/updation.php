

<?php
  session_start();
  
  if(isset($_SESSION['rid']))
  {
	  echo "your id is ".$_SESSION['rid'];
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
 if(!isset($_POST['submit']))
 {
include('header.php');
include('../dbcon.php');

   $rid=$_GET['sid'];
  
  $qry="select * from resource where rid=$rid";
  $result=mysqli_query($con,$qry);
   
   $row=mysqli_fetch_array($result);
?>

  
 <form action="updation.php" method="post" enctype="multipart/form-data" >
 
     <table  align="center" bgcolor="pink" border="2px" width="80%">
	 
	    <tr> 
		  
		    <td><input type="hidden" name="rid"  value="<?php echo $row['rid']?>" /> </td>
		 
		</tr>
	    <tr> 
		  <th> Stream
		   </th>
		    <td><input type="text" name="stream" value="<?php echo $row['stream']?>" required /> </td>
		 
		</tr>
		
		<tr>
		  <th> Subject
		   </th>
		    <td> <input type="text" name="subject" value="<?php echo $row['subject']?>"required /> </td>
		 
		</tr>
		
		<tr>
		  <th> select year
		   </th>
		    <td> <input type="text" name="year" value="<?php echo $row['year']?>"required/> 
			
			</td>
		 
		</tr>
		
		<tr>
		  <th> Reference Books
		   </th>
		    <td><input type="text" name="reference_books" value="<?php echo $row['reference_books']?>"required /> </td>
		 
		</tr>
		
		<tr>
		  <th> Channels
		   </th>
		    <td><input type="text" name="channels" value="<?php echo $row['channels']?>"required /> </td>
		 
		</tr>
		
		<tr>
		  <th> Question_papers
		   </th>
		    <td> <input type="file" name="papers" value="Upload_Questio_Paper" /> </td>
		 
		</tr>
		
		
		<tr>
		  <th> Submit_Details
		   </th>
		    <td><input type="submit" name="submit" value="update"/> </td>
		 
		</tr>
	 </table>
  </form>
 <?php
 }
  ?>
    <?php
      if(isset($_POST['submit']))
	  {
		  $rid=$_POST['rid'];
		  $subject=$_POST['subject'];
		  $stream=$_POST['stream'];
		  $year=$_POST['year'];
		  
		  $reference_books=$_POST['reference_books'];
		  $channels=$_POST['channels'];
		  $papername=$_FILES['papers']['name'];
		  $tempname=$_FILES['papers']['tmp_name'];
		  move_uploaded_file($tempname,"../Question_papers/$papername");
		  include('../dbcon.php');
		  
		  $qry="update resource set subject='$subject', stream='$stream', year='$year',reference_books='$reference_books',channels='$channels',papers='$papername' where rid=$rid";
		  $result=mysqli_query($con,$qry);
		  
		  if($result==true)
		  { ?>
	  
			 <script>
			    alert("Record Updated successfully");
				
			 </script>
			 <?php
			   echo "<a href=admindash.php>Back to dashboard</a>";
		  }
		  
		  
		  
		  
		  
	  }
  ?>
  
  