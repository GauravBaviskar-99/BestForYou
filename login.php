
<?php
  
   session_start();
   if(isset($_SESSION['rid']))
   {
	   header('location:admin/admindash.php');
   }

?>
<html>
  
   <head>
    <title>Admin Login</title>
	<link rel="stylesheet" href="css/login.css">
	</head>
	<body bgcolor="pink" vlink="red">
	<h1 style="color:red;"> <marquee> BEST RESOURCES FOR YOU...!!! </marquee></h1>
	

	
	
	
	
	
	
	 
	 <div class="box">

  <h1 align="center"  textcolor="red" >ADMIN LOGIN</h1>
 
<form    action="login.php" method="post">

  <div class="inputbox">
    <input  type="email"  name="email" required />
        <label>Email</label>
        
       </div>



 

   <div class="inputbox">
     <input  type="password"  name="password"  required/>
         <label>PASSWORD</label> 
             </div>
  
  
    <INPUT TYPE="SUBMIT" VALUE="LOGIN"  name="login"/>
     


  </form>
  
   </div>
 

 
	  
	   <div  style=" color:red; text-decoration:none; position:relative; top:70%; left:12%;"  >
   
   
 <A href="http://localhost/bestforyou"  >SKIP_LOGIN </a> </br></br></br>
   

   </div>
    
	  
	  
	  
	  
	</body>

</html>

<?php
  
   if(isset($_POST['login']))
   {
	   
	   include('dbcon.php');
	   
	   $username=$_POST['email'];
	   $password=$_POST['password'];
	   
	   $result=mysqli_query($con,"select * from admin where username='$username' and password='$password'");
	   
	    $no=mysqli_num_rows($result);
		if($no>=1)
		{
			echo "login successfully";
			$row=mysqli_fetch_array($result);
			
			 $id=$row['id'];
			 
			 echo "id is =".$id."<br>";
			 
			
			 
			 $_SESSION['rid']=$id;
			
			 ?>
			 <script>
			   window.open('admin/admindash.php','_self');
			 </script>
			 <?php
			
		}
		else
		{
			?>
			<script>
			   
			   alert("Username or Password is incorrect");
			   window.open('login.php','_self');
			</script>
			
			<?php
			
		}
	
   }

?>