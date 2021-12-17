<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM `tbdonor` WHERE `tbdonor`.`id` = '$_SESSION[id]'";

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
				<title> <?php echo $row["dname"];?>'s Profile page </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/blood-donation/style/style.css" title="style" />
				<style>
					body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
					label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
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
					</div>
					<div id="site_content">
						<div class="container">
							<div class="subheader"> Your information </div>
							<button class="button" onclick="return permit1()">
								<?php echo "<a href='profileupdate.php'> Edit </a>"; ?>
							</button>
							<button class="button" onclick="return permit2()">
								<?php echo "<a href='delete.php'> Delete </a>"; ?>
							</button>
							<button class="button" style="float:right;" onclick="return permit3()">
								<?php echo "<a href='logout.php'> Log out </a>"; ?>
							</button>
						</div>
						<div class="container">
							<?php
								echo "<img src='http://localhost/blood-donation/pimage/$row[image]' width='150px;' alt='$row[dname] picture'>";
								echo "<label> Donor ID</label>: ", $row["id"];
								echo "<br/> <label> Name</label>: ", $row["dname"];
								echo "<br/> <label> Gender</label>: ", $row["sex"];
								echo "<br/> <label> Mobile</label>: ", $row["dnumber"];
								echo "<br/> <label> E-mail</label>: ", $row["demail"];
								echo "<br/> <label> Address</label>: ", $row["daddress"];
								echo "<br/> <label> Blood Group</label>: ", $row["dblood"];
								echo "<br/> <label> Last Donate</label>: ", $row["lddate"];
							?>
						</div>
					</div>
					<div id="content_footer"></div>
					<div id="footer">
						Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
					</div>
				</div>
				<script>
					function permit1(){
						if(!confirm("Sure to edit your information?")){
							return false;
						}
						else{
							return true;
						}
					}
					function permit2(){
						if(!confirm("Sure to delete your information?")){
							return false;
						}
						else{
							return true;
						}
					}
					function permit3(){
						if(!confirm("Do you want to Log out?")){
							return false;
						}
						else{
							return true;
						}
					}
				</script>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/blood-donation/log/login.php");
	}
?>