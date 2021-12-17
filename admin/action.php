<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//local variable
	$name = $_POST['name'];
	$password = $_POST['password'];
	

	//create a uniqe id for donner
	$date = new DateTime();
	$passlast = $date -> format('Ymj');

	//sql query for upload data to database
	$sqlquery = "UPDATE admin SET id = '$name', password = '$password', passlast = '$passlast' WHERE admin.id = '$_POST[name]';";
	
	//method for upload data to database
	mysqli_query($conect, $sqlquery);
	
	//mehtod to redirect this page to another page
	header("location:http://localhost/blood-donation/admin/adminprofile.php");
?>