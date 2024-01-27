<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM admin WHERE admin.id = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);

		//convert 2D array to 1D array
		$row = mysqli_fetch_array($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> Admin panel </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/blood-donation/style/style.css" title="style" />
				<style>
					body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
					.label {margin:01px;padding:05px;border:02px;width:155px;font-weight:bold;display:inline-block;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;width:150px;font-weight:bold;display:inline-block;font-size:20px;}
					.button {margin:01px;padding:05px;border:01px;border-radius:08px;}
					a {text-decoration:none;font-weight:bold;}
					img {float:right;padding:05px;margin:05px;}
					
				</style>
			</head>
			<body>
				<div id="main">
					<div id="header">
						<div id="logo">
							<div id="logo_text">
								<h1><a href="index.html">Blood-donation</a></h1>
								<h2>Give blood, be a hero.</h2>
							</div>
						</div>
						<div id="menubar">
							<ul id="menu">
								<li class="selected"><a href="adminprofile.php">Home</a></li>
								<li onclick="return apermit()"><a href="donorlist.php">All donor</a></li>
							</ul>
						</div>
					</div>
					<div id="site_content">
						<div class="container">
							<div class="subheader"> Admin panel </div>
							<button class="button" onclick="return permit1()">
								<?php echo "<a href='adminprofileupdate.php'> Edit admin info </a>"; ?>
							</button>
							<button class="button" style="float:right;" onclick="return permit3()">
								<?php echo "<a href='logout.php'> Log out </a>"; ?>
							</button>
						</div>
						<div class="container">
							<?php
								echo "<label class='label'> Admin</label>: ", $row["id"];
								echo "<br/> <label class='label'> Last password change</label>: ", $row["passlast"];
							?>
						</div>
						<div class="container">
							<div style="display:flex;justify-content:center;">
								<?php
								//sql query to find user information from database
								$sqlquery = "SELECT * FROM `bgroup`";

								//take data from database
								$data1 = mysqli_query($conect, $sqlquery);
								$data2 = mysqli_query($conect, $sqlquery);
								$row1=mysqli_fetch_array($data1);
								$row2=mysqli_fetch_array($data2);
								?>
								<table border="1">
									<caption> Group wise registered Blood Donor information</caption>
									<tbody>
										<tr>
											<th> Blood group </th>
											<?php
											do{
												echo "<td> $row1[name] </td>";
											}while($row1=mysqli_fetch_array($data1));
											?>
										</tr>
										<tr>
												<th> Total donor </th>
											<?php
											do{
												if($row2['number'] == null){
													echo "<td> N / A </td>";
												}
												else{
													echo "<td> $row2[number] </td>";
												}
											}while($row2=mysqli_fetch_array($data2));
											?>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="container">
							<p style='text-align:center;width:99%;display:block;' class='subheader'> Massages from user </p>
							<div style="display:flex;justify-content:center;flex-wrap:wrap;">
							<?php
							$sqlquery = "SELECT * FROM comment";
							//take data from database
							$data = mysqli_query($conect, $sqlquery);
							$row = mysqli_fetch_array($data);
							if($row){
								do{
									echo "
										<div style='margin:05px;padding:05px;border:01px solid;display:inline-block;background:cornsilk;width:40%;'>
											<label style='font-weight:bold'> Name : </label> $row[name] <br/>
											<label style='font-weight:bold'> email : </label> $row[email] <br/>
											<label style='font-weight:bold'> massage : </label> <br/> ''$row[comment]'' <br/>
											<label style='font-weight:bold'> Action : </label> <a href='deletedonor.php?time=$row[time]'> Delete </a>
										</div>
									";
								}while($row=mysqli_fetch_array($data));
							}
							else{
								echo "There is no massage from users.";
							}
							?>
							</div>
						</div>
					</div>
					<div id="content_footer"></div>
					<div id="footer">
						Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
					</div>
				</div>
				<script src="http://localhost/blood-donation/Script.js"></script>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/blood-donation/admin/");
	}
?>