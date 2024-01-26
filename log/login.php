<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> User Log in page </title>
		<link rel="stylesheet" type="text/css" href="http://localhost/blood-donation/style/style.css" title="style" />
		<style>
			body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
			label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
			input {margin:01px;padding:05px;border:01px solid;width:50vw;}
			a {text-decoration:none;}
			input::placeholder {color:black;}
			.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
			.button {margin:01px;padding:05px;border:01px;border-radius:08px;cursor:pointer;font-weight:bold;}
			.msg {margin:01px;padding:05px;border:01px;color:red;}
		</style>
	</head>
	<body>
		<div id="main">
			<div id="header">
				<div id="logo">
					<div id="logo_text">
						<h1><a href="index.html">Blood-managment</a></h1>
						<h2>Give blood be a hero.</h2>
					</div>
				</div>
				<div id="menubar">
					<ul id="menu">
						<!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
						<li><a href="http://localhost/blood-donation/">Home</a></li>
						<li><a href="http://localhost/blood-donation/regdonor.html">Become donor</a></li>
						<li><a href="http://localhost/blood-donation/donorlist.php">Donor list</a></li>
						<li><a href="http://localhost/blood-donation/search.php">Search donor</a></li>
						<li><a href="http://localhost/blood-donation/contact.php">Contact</a></li>
						<li class="selected"><a href="login.php">Donor log in</a></li>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<div class="subheader"> Log in form </div>
					<div class="msg">
					<?php
						if(isset($_SESSION['id'])){
							echo "Incorrect user id or password.";
							session_destroy();
						} 
					?>
					</div>
					<form action="authentication.php" method="post" onsubmit="return validate()">
					<?php
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
						<label> Donor ID </label>: <input type="text" id="uid" name="id" value="<?php echo $row['id'];?>" required=""/> <br/>
						<label> Password </label>: <input type="password" id="pass" name="password" value="<?php echo $row['password'];?>" required=""/> <br/>
					<?php
					}
					else{
					?>
						<label> Donor ID </label>: <input type="text" id="uid" name="id" placeholder="Enter your ID" required=""/> <br/>
						<label> Password </label>: <input type="password" id="pass" name="password" placeholder="Enter your password" required=""/> <br/>
					<?php
					}
					?>
					<button class="button" type="Submit" value="Login"> Login </button>
					<button class="button" type="Reset" value="Reset"> Reset </button> <br/>
				</form> <br/>
				<?php
				if(isset($_GET['key'])){
					echo "<div> Remember Your ID and password for future use!</div>";
				}
				else{
					echo "<div> Don't have any account? <a href='http://localhost/blood-donation/regdonor.html' class='button'> Register </a> </div>";
				}
				?>
			</div>
			<div id="content_footer"></div>
			<div id="footer">
				Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
			</div>
		</div>
		<script>
			function validate(){
				//Reguler Expressions
				var idpattern = /^[0-9]{12}$/;
				var passwordpattern = /^[a-z0-9\@\#\$\%\&]{4,8}$/i;
				
				//Values from user
				var idvalue = document.getElementById('uid').value;
				var passwordvalue = document.getElementById('pass').value;
				
				//Validate the value
				if(!idpattern.test(idvalue)){
					alert("!Incorrect ID format");
					return false;
				}
				else if(!passwordpattern.test(passwordvalue)){
					alert("!Incorrect password format");
					return false;
				}
				else{
					return true;
				}
			}
		</script>
	</body>
</html>