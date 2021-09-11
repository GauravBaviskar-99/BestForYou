<?php
 include('header.php');
 
   session_start();
   if(isset($_SESSION['rid']))
   {
	   echo "your Id is ".$_SESSION['rid'];
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
   
  <form method="post" action="updaterecord.php">
     <table align="center" >
	     <tr>
		     <th>Select Year</th>
			 <td>
			 <select name="year" >
			  <option>First Year</option>
			   <option>Second Year</option>
			    <option>Third Year</option>
				 <option>Fourth Year</option>
			 </select>
			 </td>
		 </tr>
		 
		  <tr>
		     <th>Select Stream</th>
			 <td>
			 <select name="stream" >
			  <option>Information Technology</option>
			   <option>Computer Engineering</option>
			    <option>Electrical Engineering </option>
				 <option>Mechanical Engineering</option>
			 </select>
			 </td>
			 
		 </tr>
		 
		  <tr>
		     <th>Enter Subject name</th>
			 <td><input type="text" name="subject" /></td>
		 </tr>
		  <tr>
		      <td>   </td>
			 <td align="center"  ><input  type="submit" name="submit" value="search" required /> </td>
		 </tr>
	 </table>
  </form>
  
 <table align="center" border="1" width="50%">
   <tr>
       
       <th colspan="2"> Resources Details </th>
	   
   </tr>
   
   
  <?php
     if(isset($_POST['submit']))
	 {
		 
		 $year=$_POST['year'];
		 $stream=$_POST['stream'];
		 $subject=$_POST['subject'];
		 
		 include('../dbcon.php');
		 
		 $qry=" select rid,subject,reference_books,channels,papers from resource where year='$year' and subject like '%$subject%'and stream='$stream'";
		 
		 $result=mysqli_query($con,$qry);
		 
		 if(mysqli_num_rows($result)<1)
			 
			 {
				 echo "<tr align=center><td colspan=7 >NO records found </td></tr>";
			 }
			 
			 else
			 {
				 while($row=mysqli_fetch_array($result))
				 { ?>
					     <tr>
					      <th>  Subject</th>
					     <td> <?php echo $row['subject'];?> </td>
						 </tr>
						  <tr>
						  <th> Reference_Books</th>
                         <td>  <?php echo $row['reference_books'];?></td>
						 </tr>
						  
						   <tr>
						  <th>Best Youtube Channels </th>
                         <td> <a href="<?php echo $row['channels'];?>"> Click To Visit Channel</a> </td>
						   </tr>
						   
						   <tr>
						   <th> Question Paper</th>
                         <td> <a href="../Question_papers/<?php echo $row['papers'];?>" download>Download latest paper <a /> </td>
                          </tr>
						  
						  <tr>               	                    	                     
	                      <td colspan="2" align="center"><a href="updation.php?sid=<?php echo $row['rid'];?>" target="_blank" >Update Record</a> </td>
                         </tr>
   
					 
					 <?php
				 }
			 }
	 }
    
  ?>
 </table>
  