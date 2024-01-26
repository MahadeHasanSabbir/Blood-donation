<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery = "SELECT * FROM `tbdonor` WHERE `tbdonor`.`id` = '$_GET[key]'";

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
			.img {float:right;padding:05px;margin:05px;text-align:center;}
			.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
			.subheader {margin:01px;padding:05px;border:02px;width:200px;font-weight:bold;font-size:20px;}
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
						<!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
						<li><a href="index.html">Home</a></li>
						<li><a href="regdonor.html">Become donor</a></li>
						<li><a href="donorlist.php">Donor list</a></li>
						<li><a href="search.php">Search donor</a></li>
						<li class="selected"><a href="contact.php">Contact</a></li>
						<li><a href="./log/login.php">Donor log in</a></li>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<div class="container">
					<div class="subheader"> Donor information </div>
				</div>
				<div class="container">
					<?php
						echo "
							<div class='img'>
								<img src='pimage/$row[image]' width='150px' alt='$$row[dname]'image> <br/>
								<a href=download.php?key=$row[id]>Download image</a>
							</div>";
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
	</body>
</html>