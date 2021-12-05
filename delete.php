<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery = "DELETE FROM dbblood.tbdonner WHERE tbdonner.id = '$_GET[key]'";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);
	
	//mehtod to redirect this page to another page
	header("location:http://localhost/blood-donation/donnorlist.php");
?>