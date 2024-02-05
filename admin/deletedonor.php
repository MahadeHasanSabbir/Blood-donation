<?php
	session_start();
	if(isset($_SESSION['id'])){
		if(isset($_GET['key'])){
			//create connection with database
			$conect = mysqli_connect("localhost","root","","dbblood");

			//sql query to find user information from database
			$sqlquery1 = "DELETE FROM dbblood.tbdonor WHERE tbdonor.id = '$_GET[key]'";
			$sqlquery2 = "DELETE FROM dbblood.donorlog WHERE donorlog.id = '$_GET[key]'";

			//take data from database
			mysqli_query($conect, $sqlquery1);
			mysqli_query($conect, $sqlquery2);
			
			//mehtod to redirect this page to another page
			mysqli_close($conect);
			header("location:http://localhost/blood-donation/admin/donorlist.php");
		}
		if(isset($_GET['time'])){
			//create connection with database
			$conect = mysqli_connect("localhost","root","","dbblood");

			//sql query to find user information from database
			$sqlquery = "DELETE FROM dbblood.comment WHERE comment.time = '$_GET[time]'";

			//take data from database
			mysqli_query($conect, $sqlquery);
			
			//mehtod to redirect this page to another page
			mysqli_close($conect);
			header("location:http://localhost/blood-donation/admin/adminprofile.php");
		}
	}
	else{
		header("location:http://localhost/blood-donation/admin/");
	}
?>