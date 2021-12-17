<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery = "SELECT * FROM `tbdonor`";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>All donor information</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
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
						<li class="selected"><a href="donorlist.php">Donor list</a></li>
						<li><a href="search.php">Search donor</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="./log/login.php">Donor log in</a></li>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<table border="1">
					<caption> Our all registered Blood Donor information given here </caption>
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
								<td> <img src='pimage/$row[image]' width='60px;' height='60px;' alt='Profile picture'/> </td>
								<td> $row[dname] </td>
								<td> $row[dnumber] </td>
								<td> $row[daddress] </td>
								<td> $row[dblood] </td>
								<td> $row[lddate] </td>
								<td> <a href='profile.php?key=$row[id]'> Full Profile </a> </td>
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
