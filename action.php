<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//local variable
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$bg = $_POST['bloodgroup'];
	$ldonet = $_POST['ldonet'];
	
	//create a uniqe id for donner
	$date = new DateTime();
	$id1 = $date -> format('ym');
	$id2 = $date -> format('j');
	if ($id2 < 10){
		$id3 = "0$id2";
	}
	else{
		$id3 = $id2;
	}
	$id4 = $date -> format('His');
	$id = "$id1$id3$id4";

	//sql query for upload data to database
	$sqlquery = "INSERT INTO tbdonner (dname, sex, dnumber, demail, daddress, dblood, id, lddate) VALUES ('$name', '$sex', '$number', '$email', '$address', '$bg', '$id', '$ldonet');";

	//method for upload data to database
	mysqli_query($conect, $sqlquery);
	
	//mehtod to redirect this page to another page
	header("location:http://localhost/blood-donation/signprofile.php?key=$id");
?>