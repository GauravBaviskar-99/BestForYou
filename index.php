<html>

<head>

<body bgcolor="lightblue" vlink="white" style="background-image:url(website_images/homepageimage1.jpeg);  background-repeat:repeat-none;  background-size:cover;">
	<h1 style="color:red; vlink:white;">
		<marquee>WELCOME IN THE WORLD OF BEST RESOURCES</marquee>
	</h1>


	<h1 align="right" style="margin-right:20px; "><a href="login.php">Admin Login</a> </h1>

	<form method="post" action="index.php">
		<table align="center">
			<tr>
				<th style="color:red; transparent:background; background:transparent; font-size:20;">Select Year</th>
				<td>
					<select name="year" name="stream" style=" color:white; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;">
						<option style=" color:red; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;">First Year</option>
						<option style=" color:red; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;">Second Year</option>
						<option style=" color:red; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;">Third Year</option>
						<option style=" color:red; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;">Fourth Year</option>
					</select>
				</td>
			</tr>

			<tr>
				<th style="color:red; font-size:20;">Select Stream</th>
				<td>
					<select name="stream" style=" color:white; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;">
						<option style=" color:red; transparent:background; border:none outline:none;  border-bottom:1px solid white;
      background:transparent;">Information Technology</option>
						<option style=" color:red; transparent:background; border:none outline:none  border-bottom:1px solid white;
      background:transparent;">Computer Engineering</option>
						<option style=" color:red; transparent:background; border:none outline:none  border-bottom:1px solid white;
      background:transparent;">Electrical Engineering </option>
						<option style=" color:red; transparent:background; border:none outline:none  border-bottom:1px solid white;
      background:transparent;">Mechanical Engineering</option>
					</select>
				</td>

			</tr>

			<tr>
				<th style="color:red; font-size:20;">
					<lable>Enter Subject name</lable>
				</th>
				<td><input type="text" name="subject" style=" color:white; transparent:background; border:none; outline:none;  border-bottom:1px solid white;
      background:transparent;" placeholder="Enter subject name" /> </td>
			</tr>
			<tr>
				<th style="color:red; font-size:20;">
					<lable>Search_Details</lable>
				</th>
				<td align="center"><input type="submit" name="submit" value="search" required /> </td>
			</tr>
		</table>
	</form>


	<table align="center" border="1" width="70%" height="50%">
		<tr>

			<th colspan="2" style="color:red; font-size:40;"> Resources Details </th>

		</tr>

		<?php
		if (isset($_POST['submit'])) {
			$year = $_POST['year'];
			$stream = $_POST['stream'];
			$subject = $_POST['subject'];

			include('dbcon.php');

			$qry = "select * from resource where year='$year' and stream='$stream' and subject like '%$subject%'";
			$result = mysqli_query($con, $qry);

			if (mysqli_num_rows($result) < 1) {
				echo "<tr align=center><td colspan=4 style=color:white;font-size:40;> SORRY CURRENTLY WE HAVE NO RECORDS FOR YOUR SUBJECT </td></tr>";
			} else {
				while ($row = mysqli_fetch_array($result)) {
		?>
					<tr>
						<th style="color:red; font-size:30;"> Subject</th>
						<td align="center" style="color:red; font-size:30;"> <?php echo $row['subject']; ?> </td>
					</tr>
					<tr>
						<th style="color:red; font-size:30;"> Reference_Books</th>
						<td align="center" style="color:white; font-size:30;"> <?php echo $row['reference_books']; ?></td>
					</tr>

					<tr>
						<th style="color:red; font-size:30;">Best Youtube Channels </th>
						<td align="center" style="color:red; font-size:30;"> <a href="<?php echo $row['channels']; ?>" target="_blank"> Click To Visit Channel</a> </td>
					</tr>

					<tr>
						<th style="color:red; font-size:30;"> Question Paper</th>
						<td align="center" style="color:red; font-size:30;"> <a href="Question_papers/<?php echo $row['papers']; ?>" download>Download latest paper <a /> </td>
					</tr>



		<?php
				}
			}
		}


		?>

</html>