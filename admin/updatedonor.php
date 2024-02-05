<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//local variable
		$id = $_POST['did'];
		$name = $_POST['name'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$bg = $_POST['bloodgroup'];
		$ldonate = $_POST['ldonate'];
		$password = $_POST['password'];
		
		
		//sql query to find user information from database
		$sqlquery1 = "UPDATE tbdonor SET dname = '$name', image = '$image', dnumber = '$number', demail = '$email', daddress = '$address', dblood = '$bg', lddate = '$ldonate' WHERE tbdonor.id = '$id';";
		$sqlquery2 = "UPDATE donorlog SET password = '$password' WHERE donorlog.id = '$id';";

		//method to update data from database
		mysqli_query($conect, $sqlquery1);
		mysqli_query($conect, $sqlquery2);
		
		//mehtod to redirect this page to another page
		mysqli_close($conect);
		header("location:http://localhost/blood-donation/admin/donorprofile.php?key=$id");
	}
	else{
		header("location:http://localhost/blood-donation/admin/");
	}
?>