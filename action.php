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
		$id2 = "0$id2";
	}
	$sql = "SELECT tuser FROM admin";
	$data = mysqli_query($conect, $sql);
	$row = mysqli_fetch_array($data);
	$id3 = $row['0'] + 1;
	if($id3 < 10){
		$id3 = "00$id3";
	}else if($id3 < 100){
		$id3 = "0$id3";
	}
	$sql = "SELECT * FROM bgroup WHERE bgroup.name = '$bg'";
	$data = mysqli_query($conect, $sql);
	$row = mysqli_fetch_array($data);
	$id4 = $row['ID'];
	$num= $row['number'] + 1;
	$id = "$id1$id2$id4$id3";

	//sql query for upload data to database
	$sqlquery1 = "INSERT INTO tbdonor (dname, image, sex, dnumber, demail, daddress, dblood, id, lddate) VALUES ('$name', '$image', '$sex', '$number', '$email', '$address', '$bg', '$id', '$ldonate');";
	$sqlquery2 = "INSERT INTO donorlog (id, password) VALUES ('$id', '$password');";
	$sqlquery3 = "UPDATE admin SET tuser = '$id3' WHERE admin.id = 'admin';";
	$sqlquery4 = "UPDATE bgroup SET number = '$num' WHERE bgroup.name = '$bg';";

	//method for upload data to database
	mysqli_query($conect, $sqlquery1);
	mysqli_query($conect, $sqlquery2);
	mysqli_query($conect, $sqlquery3);
	mysqli_query($conect, $sqlquery4);
	
	//mehtod to redirect this page to another page
	mysqli_close($conect);
	header("location:http://localhost/blood-donation/log/login.php?key=$id");
?>