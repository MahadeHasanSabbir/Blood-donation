<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	// Downloads files
	if (isset($_GET['key'])) {
		$id = $_GET['key'];

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM tbdonor WHERE tbdonor.id = '$id'";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);

		$row = mysqli_fetch_assoc($data);
		$filepath = 'pimage/' . $row['image'];

		if (file_exists($filepath)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($filepath));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize('pimage/' . $row['image']));
			readfile('pimage/' . $row['image']);

			exit;
		}
	}
?>