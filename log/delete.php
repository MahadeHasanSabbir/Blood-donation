<?php
	session_start();
	if(isset($_SESSION['id'])){
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery1 = "DELETE FROM dbblood.tbdonor WHERE tbdonor.id = '$_SESSION[id]'";
	$sqlquery2 = "DELETE FROM dbblood.donorlog WHERE donorlog.id = '$_SESSION[id]'";

	//take data from database
	$data = mysqli_query($conect, $sqlquery1);
	$data = mysqli_query($conect, $sqlquery2);
	
	session_destroy();
	
	//mehtod to redirect this page to another page
	header("location:http://localhost/blood-donation/donorlist.php");
	}
	else{
		header("location:http://localhost/blood-donation/log/login.php");
	}
?>