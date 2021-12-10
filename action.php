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
	$ldonate = $_POST['ldonate'];
	$password = $_POST['password'];
	//process profile picture
	$image = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder="pimage/";
	//method for upload picture to server folder
	move_uploaded_file($file_loc,$folder.$image);

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
	$sqlquery1 = "INSERT INTO tbdonor (dname, image, sex, dnumber, demail, daddress, dblood, id, lddate) VALUES ('$name', '$image', '$sex', '$number', '$email', '$address', '$bg', '$id', '$ldonate');";
	$sqlquery2 = "INSERT INTO donorlog (id, password) VALUES ('$id', '$password');";

	//method for upload data to database
	mysqli_query($conect, $sqlquery1);
	mysqli_query($conect, $sqlquery2);
	
	//mehtod to redirect this page to another page
	header("location:http://localhost/blood-donation/log/login.php?key=$id");
?>