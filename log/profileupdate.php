<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery1 = "SELECT * FROM tbdonor WHERE tbdonor.id = '$_SESSION[id]'";
		$sqlquery2 = "SELECT * FROM donorlog WHERE donorlog.id = '$_SESSION[id]'";

		//take data from database
		$data1 = mysqli_query($conect, $sqlquery1);
		$data2 = mysqli_query($conect, $sqlquery2);

		//convert 2D array to 1D array
		$row1 = mysqli_fetch_array($data1);
		$row2 = mysqli_fetch_array($data2);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> <?php echo $row1['dname'];?>'s Information update Form</title>
				<style>
					body {margin:01px;padding:05px;border:02px;background:lightgray;line-height:30px;}
					label {marin:01px;padding:05px;border:02px;display:inline-block;width:90px;font-weight:bold;}
					input {margin:01px;padding:05px;border:01px solid;width:50vw;}
					input[type="radio"] {width:12px;}
					input[type="file"] {border:01px;}
					input::placeholder {color:black;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
					.button {margin:01px;padding:05px;border:01px solid;border-radius:08px;cursor:pointer;}
				</style>
			</head>
			<body>
				<div class="container">
					<div class="subheader"> Information update form </div>
					<form action="update.php" name="bgregform" onsubmit="return validate()" autocomplete="off" method="post"  enctype="multipart/form-data">
						<label> Name </label>:  <input type="text" name="name" id="dname" value="<?php echo $row1['dname'];?>" required=""/><br/>
						<label> Image </label>:  <input type="file" name="image" id="dimage" accept="image/x-png,image/gif,image/jpeg" value="<?php echo $row1['image'];?>" title="file name should not contain any space" required=""/> <br/>
						<label> Gender </label>:
							<input type="radio" name="sex" value="male" checked=""/> Male
							<input type="radio" name="sex" value="female"/> Female <br/>
						<label> Mobile </label>:  <input type="text" name="number" id="dnumber" value="<?php echo $row1['dnumber'];?>" required=""/> <br/>
						<label> E-mail </label>:  <input type="text" name="email" id="dmail" value="<?php echo $row1['demail'];?>" required=""/> <br/>
						<label> Address </label>:  <input type="text" name="address" id="daddress" value="<?php echo $row1['daddress'];?>" title="caracter limit 20" required=""/> <br/>
						<label> Blood </label>:
						<select name="bloodgroup">
							<option value="A+ve"> A+ve </option>
							<option value="A-ve"> A-ve </option>
							<option value="B+ve"> B+ve </option>
							<option value="B-ve"> B-ve </option>
							<option value="AB+ve"> AB+ve </option>
							<option value="AB-ve"> AB-ve </option>
							<option value="O+ve"> O+ve </option>
							<option value="O-ve"> O-ve </option>
						</select>
						<br/>
						<label> Last Donate </label>:  <input type="date" name="ldonate" id="ldd" value="<?php echo $row1['lddate']?>" required=""/> <br/>
						<label> Password </label>:  <input type="password" name="password" id="pass" value="<?php echo $row2['password']?>" title="alphanumaric and @,#,$,%,& are allow" required=""/> <br/>
						<button type="Submit" value="Update" class="button"> Update </button> <br/>
					</form>
				</div>
				<script>
					function validate(){
						//Reguler Expressions
						var namepattern = /^[a-z ]{3,30}$/i;
						var numberpattern = /^[0-9]{11}$/;
						var emailpattern = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
						var addresspattern = /^[a-z0-9 \,]{5,25}$/i;
						var passwordpattern = /^[a-z0-9\@\#\$\%\&]{4,8}$/i;
						
						//Values from user
						var namevalue = document.getElementById('dname').value;
						var numbervalue = document.getElementById('dnumber').value;
						var emailvalue = document.getElementById('dmail').value;
						var addressvalue = document.getElementById('daddress').value;
						var passwordvalue = document.getElementById('pass').value;
						
						//Validate the value
						if(!namepattern.test(namevalue)){
							alert("Incorrect name");
							return false;
						}
						else if(!numberpattern.test(numbervalue)){
							alert("Incorrect number");
							return false;
						}
						else if(!emailpattern.test(emailvalue)){
							alert("Incorrect E-mail");
							return false;
						}
						else if(!addresspattern.test(addressvalue)){
							alert("Incorrect address");
							return false;
						}
						else if(!passwordpattern.test(passwordvalue)){
							alert("Incorrect password");
							return false;
						}
						else
							alert(namevalue + ". Your information will update!\nClick ok to proceed");
						}
				</script>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/blood-donation/log/login.php");
	}
?>