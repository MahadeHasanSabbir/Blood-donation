<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM `tbdonor`";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> All Donor information page </title>
				<link rel="stylesheet" type="text/css" href="http://localhost/blood-donation/style/style.css" title="style" />
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
							</ul>
						</div>
					</div>
					<div id="site_content">
						<table border="1">
							<caption> All registered Blood Donor information</caption>
							<tbody>
								<tr>
									<th> Picture </th>
									<th> Name </th>
									<th> Mobile </th>
									<th> Address </th>
									<th> Blood Group </th>
									<th> Last Donate </th>
									<th> Profile </th>
								</tr>
								<?php
								while($row=mysqli_fetch_array($data)){
								echo "<tr>
										<td> <img src='http://localhost/blood-donation/pimage/$row[image]' width='60px;' height='60px;' alt='$row[dname] picture'/> </td>
										<td> $row[dname] </td>
										<td> $row[dnumber] </td>
										<td> $row[daddress] </td>
										<td> $row[dblood] </td>
										<td> $row[lddate] </td>
										<td> <a href='donorprofile.php?key=$row[id]'> Full Profile </a> </td>
									</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
					<div id="content_footer"></div>
					<div id="footer">
						Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
					</div>
				</div>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/blood-donation/admin/");
	}
?>