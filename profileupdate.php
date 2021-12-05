<?php
	session_start();
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");

	//sql query to find user information from database
	$sqlquery = "SELECT * FROM tbdonner WHERE tbdonner.id = '$_GET[key]'";

	//take data from database
	$data = mysqli_query($conect, $sqlquery);

	//convert 2D array to 1D array
	$row = mysqli_fetch_array($data);
	
	//create a global variable
	$_SESSION['id'] = $row['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> <?php echo $row['dname']?>'s information update Form</title>
		<style>
			body {margin:01px;padding:05px;border:02px;line-height:25px;}
			label {marin:01px;padding:05px;border:02px;display:inline-block;width:90px;font-weight:bold;}
			input {margin:01px;padding:05px;border:01px solid;width:50vw;}
			input[type="radio"] {width:12px;}
			input::placeholder {color:black;}
		</style>
	</head>
	<body>
		<form action="update.php" name="bgregform" onchange="return validate()" autocomplete="off" method="post">
			<label> Name </label>:  <input type="text" name="name" id="dname" value="<?php echo $row['dname']?>" required=""/><br/>
			<label> Gender </label>:
				<input type="radio" name="sex" value="male"/> Male
				<input type="radio" name="sex" value="female"/> Female <br/>
			<label> Mobile </label>:  <input type="text" name="number" id="dnumber" value="<?php echo $row['dnumber']?>" required=""/> <br/>
			<label> E-mail </label>:  <input type="text" name="email" id="dmail" value="<?php echo $row['demail']?>" required=""/> <br/>
			<label> Address </label>:  <input type="text" name="address" id="daddress" value="<?php echo $row['daddress']?>" title="caracter limit 20" required=""/> <br/>
			<label> Blood </label>:  <input type="text" name="bloodgroup" id="dbg" value="<?php echo $row['dblood']?>" required=""/> <br/>
			<label> Last Donet </label>:  <input type="text" name="ldonet" id="ldd" value="<?php echo $row['lddate']?>" required=""/> <br/>
			<button type="submit" value="Update"> Update </button> <br/>
		</form>
		<script>
			function validate(){
				//Reguler Expressions
				var namepattern = /^[a-z ]+$/i;
				var numberpattern = /^[0-9]{11}$/;
				var emailpattern = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
				var addresspattern = /^[a-z0-9 ]{5,20}$/i;
				var bloodpattern = /^(A|B|O|AB)(\+|\-)ve$/i;
				var datepattern = /^[0-9\-]{10}$/;
				
				//Values from user
				var namevalue = document.getElementById('dname').value;
				var numbervalue = document.getElementById('dnumber').value;
				var emailvalue = document.getElementById('dmail').value;
				var addressvalue = document.getElementById('daddress').value;
				var bloodvalue = document.getElementById('dbg').value;
				var lastdonetvalue = document.getElementById('ldd').value;
				
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
				else if(!bloodpattern.test(bloodvalue)){
					alert("Incorrect blood");
					return false;
				}
				else if(!datepattern.test(lastdonetvalue)){
					alert("Incorrect date");
					return false;
				}
				else
					alert(namevalue + ". Your information will update!\nClick ok to procsid");
			}
		</script>
	</body>
</html>