<?php
	session_start();
	if(isset($_GET['key'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM donorlog WHERE donorlog.id = '$_GET[key]'";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);

		//convert 2D array to 1D array
		$row = mysqli_fetch_array($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> User Log in page </title>
				<style>
					body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
					label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
					input {margin:01px;padding:05px;border:01px solid;width:50vw;}
					a {text-decoration:none;}
					input::placeholder {color:black;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
					.button {margin:01px;padding:05px;border:01px;border-radius:08px;cursor:pointer;font-weight:bold;}
				</style>
			</head>
			<body>
				<div class="container">
					<div class="subheader"> Log in form </div>
					<form action="authentication.php" method="post">
						<label> Donor ID </label>: <input type="text" name="id" value="<?php echo $row['id'];?>" required=""/> <br/>
						<label> Password </label>: <input type="password" name="password" value="<?php echo $row['password'];?>" required=""/> <br/>
						<button class="button" type="Submit" value="Login"> Login </button>
						<button class="button" type="Reset" value="Reset"> Reset </button> <br/>
					</form> <br/>
					<div> Remember Your ID and password for future use!</div>
				</div>
			</body>
		</html>
<?php
	}
	else{
?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<title> User Log in page </title>
				<style>
					body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
					label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
					input {margin:01px;padding:05px;border:01px solid;width:50vw;}
					a {text-decoration:none;}
					input::placeholder {color:black;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
					.button {margin:01px;padding:05px;border:01px;border-radius:08px;cursor:pointer;font-weight:bold;}
					.msg {margin:01px;padding:05px;border:01px;color:red;}
				</style>
			</head>
			<body>
				<div class="container">
					<div class="subheader"> Log in form </div>
					<div class="msg">
						<?php
							if(isset($_SESSION['id'])){
								echo "Incorrect user id or password.";
								session_destroy();
							} 
						?>
					</div>
					<form action="authentication.php" method="post">
						<label> Donor ID </label>: <input type="text" name="id" placeholder="Enter your ID" required=""/> <br/>
						<label> Password </label>: <input type="password" name="password" placeholder="Enter your password" required=""/> <br/>
						<button class="button" type="Submit" value="Login"> Login </button>
						<button class="button" type="Reset" value="Reset"> Reset </button> <br/>
					</form> <br/>
					<div> Don't have any account? <a href="http://localhost/blood-donation/regdonor.html" class="button"> Register </a> </div>
				</div>
			</body>
		</html>
<?php
	}
?>