<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>contact with us</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
		<style>
			label {margin:01px;padding:05px;border:02px;width:70px;font-weight:bold;display:inline-block;}
			input {margin:01px;padding:05px;border:01px solid;width:40vw}
			input::placeholder {color:black;}
			.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
			.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:block;font-size:20px;}
			.button {margin:08px 05px;padding:05px;border:solid 01px;border-radius:08px;}
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
				<div id="menubar">
					<ul id="menu">
						<li><a href="index.html">Home</a></li>
						<li><a href="regdonor.html">Become donor</a></li>
						<li><a href="donorlist.php">Donor list</a></li>
						<li><a href="search.php">Search donor</a></li>
						<li class="selected"><a href="contact.php">Contact</a></li>
						<li><a href="./log/login.php">Donor log in</a></li>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<div class="container">
					<div class="subheader">Contact info</div>
					<label>Phone</label>: +88******** <br/>
					<label>Mobile</label>: +8801********* <br/>
					<label>E-mail</label>: <a href="mailto:info@blooddonation.org">info@blooddonation.org</a> <br/>
					<label>Fax</label>: +******
				</div>
				<div class="container">
					<div class="subheader"> Ask any query or give feedback</div>
					<?php
					if(isset($_POST['name'])){
						//create connection with database
						$conect = mysqli_connect("localhost","root","","dbblood");
						
						//local variable
						$name = $_POST['name'];
						$email = $_POST['email'];
						$comment = $_POST['comment'];
						
						//sql query for upload data to database
						$sqlquery = "INSERT INTO comment (name, email, comment) VALUES ('$name', '$email', '$comment')";
						
						//method for upload data to database
						mysqli_query($conect, $sqlquery);
						
						//success massage
						echo "<h4 style='color:green;margin:05px;'>Your massage send successfully. We will contact you within a day. </h4>";
					}
					?>
					<form method="post">
						<label>Name</label>: <input type="text" name="name" placeholder="Enter your name." required=""/> <br/>
						<label>E-mail</label>: <input type="email" name="email" placeholder="Enter your email." required=""/> <br/>
						<label>Comment</label>: <input type="text" name="comment" placeholder="Enter your query or feedback."required=""/> <br/>
						<button type="Submit" class="button" value="Submit">Submit</button>
					</form>
				</div>
			</div>
			<div id="content_footer"></div>
			<div id="footer">
				Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
			</div>
		</div>
	</body>
</html>
