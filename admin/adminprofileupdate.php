<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM admin WHERE admin.id = '$_SESSION[id]'";

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
				<title> Admin information update Form</title>
				<link rel="stylesheet" type="text/css" href="http://localhost/blood-donation/style/style.css" title="style" />
				<style>
					body {margin:01px;padding:05px;border:02px;background:lightgray;line-height:30px;}
					label {marin:01px;padding:05px;border:02px;display:inline-block;width:90px;font-weight:bold;}
					input {margin:01px;padding:05px;border:01px solid;width:40vw;}
					input::placeholder {color:black;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
					.button {margin:01px;padding:05px;border:01px solid;border-radius:08px;cursor:pointer;}
				</style>
			</head>
			<body>
				<div id="main">
					<div id="header">
						<div id="logo">
							<div id="logo_text">
								<h1><a href="index.html">Blood-donation</a></h1>
								<h2>Give blood, be a hero.</h2>
							</div>
						</div>
					</div>
					<div id="site_content">
						<div class="container">
							<div class="subheader"> Admin information update form </div>
							<form action="action.php" onsubmit="return validate()" autocomplete="off" method="post" >
								<label> Admin </label>:  <input type="text" name="name" id="dname" value="<?php echo $row['id'];?>" required=""/><br/>
								<label> Password </label>:  <input type="password" name="password" id="pass" value="<?php echo $row['password']?>" title="alphanumaric and @,#,$,%,& are allow" required=""/> <br/>
								<button type="Submit" value="Update" class="button"> Update </button> <br/>
							</form>
						</div>
					</div>
					<div id="content_footer"></div>
					<div id="footer">
						Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
					</div>
				</div>
				<script>
					function validate(){
						//Reguler Expressions
						var namepattern = /^[a-z ]{3,30}$/i;
						var passwordpattern = /^[a-z0-9\@\#\$\%\&]{4,8}$/i;
						
						//Values from user
						var namevalue = document.getElementById('dname').value;
						var passwordvalue = document.getElementById('pass').value;
						
						//Validate the value
						if(!namepattern.test(namevalue)){
							alert("Incorrect name");
							return false;
						}
						else if(!passwordpattern.test(passwordvalue)){
							alert("Incorrect password");
							return false;
						}
						else
							alert("Your information will update!\nClick ok to proceed");
						}
				</script>
			</body>
		</html>
<?php
	mysqli_close($conect);
	}
	else{
		header("location:http://localhost/blood-donation/admin/");
	}
?>