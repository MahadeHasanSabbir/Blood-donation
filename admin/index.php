<?php
	session_start();
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="http://localhost/blood-donation/style/style.css" title="style" />
		<title> Admin Log in page </title>
		<style>
			body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
			label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
			input {margin:01px;padding:05px;border:01px solid;width:50vw;}
			a {text-decoration:none;}
			input::placeholder {color:black;}
			.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
			.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;text-align:center;}
			.button {margin:01px;padding:05px;border:01px;border-radius:08px;cursor:pointer;font-weight:bold;}
			.msg {margin:01px;padding:05px;border:01px;color:red;}
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
				<div class="subheader"> Admin log in form </div>
				<div class="msg">
					<?php
						if(isset($_SESSION['id'])){
							echo "Incorrect admin id or password.";
							session_destroy();
						} 
					?>
				</div>
				<form action="authentication.php" method="post">
					<label> Admin </label>: <input type="text" name="id" placeholder="Enter your ID" required=""/> <br/>
					<label> Password </label>: <input type="password" name="password" placeholder="Enter your password" required=""/> <br/>
					<button class="button" type="Submit" value="Login"> Login </button>
					<button class="button" type="Reset" value="Reset"> Reset </button> <br/>
				</form>
			</div>
			<div id="content_footer"></div>
			<div id="footer">
				Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
			</div>
		</div>
	</body>
</html>