<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery = "SELECT * FROM `tbdonner` WHERE `tbdonner`.`id` = '$_GET[key]'";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);

	//convert 2D array to 1D array
	$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
	<head>
		<title> <?php echo $row["dname"];?>'s Profile page </title>
		<style>
			body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
			label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
			.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
			.subheader {margin:01px;padding:05px;border:02px;width:200px;font-weight:bold;}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="subheader"> Donner information </div>
		</div>
		<div class="container">
			<?php
				echo "<label> Donner ID</label>: ", $row["id"];
				echo "<br/> <label> Name</label>: ", $row["dname"];
				echo "<br/> <label> Gender</label>: ", $row["sex"];
				echo "<br/> <label> Mobile</label>: ", $row["dnumber"];
				echo "<br/> <label> E-mail</label>: ", $row["demail"];
				echo "<br/> <label> Address</label>: ", $row["daddress"];
				echo "<br/> <label> Blood Group</label>: ", $row["dblood"];
				echo "<br/> <label> Last Donet</label>: ", $row["lddate"];
			?>
		</div>
	</body>
	
</html>