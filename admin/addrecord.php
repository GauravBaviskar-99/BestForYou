
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

 include('header.php');
 
 ?>
    
	
 <form action="addrecord.php" method="post" enctype="multipart/form-data" >
 
 
      <table  align="center" bgcolor="pink" border="2px" width="80%" style="border-radius: 25px;">
	    <tr> 
		  <th>  Stream
		   </th>
		    <td><input type="text" name="stream" required /> </td>
		 
		</tr>
 
     
	    <tr> 
		  <th> Subject
		   </th>
		    <td><input type="text" name="subject" required /> </td>
		 
		</tr>
		
		<tr>
		  <th> Year
		   </th>
		    <td> <input type="text" name="year" required /> </td>
		 
		</tr>
		
		<tr>
		  <th> Youtube Channel
		   </th>
		    <td> <input type="text" name="channels" required/> </td>
		 
		</tr>
		
		<tr>
		  <th> Latest Question Paper
		   </th>
		    <td><input type="file" name="papers" value="Browse_here" required /> </td>
		 
		</tr>
		
		<tr>
		  <th> Reference_Books
		   </th>
		    <td><input type="text" name="reference_books" required /> </td>
		 
		</tr>
		
			
		<tr>
		  <th> Submit_Details
		   </th>
		    <td><input type="submit" name="submit"/> </td>
		 
		</tr>
	 </table>
  </form>
  
  
  </body>
  </html>
  
  <?php
      if(isset($_POST['submit']))
	  {
		  $stream=$_POST['stream'];
		  $subject=$_POST['subject'];
		  $year=$_POST['year'];
		  $channels=$_POST['channels'];
		  $reference_books=$_POST['reference_books'];
		  
		  $papername=$_FILES['papers']['name'];
		  $tempname=$_FILES['papers']['tmp_name'];
		  move_uploaded_file($tempname,"../Question_papers/$papername");
		  include('../dbcon.php');
		  
		  $qry="insert into resource(stream,subject,year,channels,reference_books,papers)values('$stream','$subject','$year','$channels','$reference_books','$papername')";
		  $result=mysqli_query($con,$qry);
		  
		  if($result==true)
		  { ?>
	  
			 <script>
			    alert("Record Inserted successfully");
			 </script>
			 <?php
		  }
		  
		  
	  }
  ?>