<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery = "SELECT * FROM `tbdonner`";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> All Donner information page </title>
		<style>
			body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
			table {margin:01px;padding:05px;border:01px;text-align:center;width:95vw;border-spacing:1px;border-collapse:separate;}
			.container {margin:01px 2vw;padding:0px;border:01px;background:white;}
		</style>
	</head>
	<body>
		<div class="container">
			<table border="1">
				<caption> Our all registered Blood Donner information given here </caption>
				<tbody>
					<tr>
						<th> Name </th>
						<th> Mobile </th>
						<th> Address </th>
						<th> Blood Group </th>
						<th> Last Donet </th>
						<th> Action </th>
					</tr>
					<?php
					while($row=mysqli_fetch_array($data)){
					echo "<tr>
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
	</body>
</html>