<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Search Donor who near you </title>
		<link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
		<style>
			table {margin:01px;padding:05px;border:01px;text-align:center;width:95vw;border-spacing:1px;border-collapse:separate;}
			label {marin:01px;padding:05px;border:02px;display:inline-block;width:90px;font-weight:bold;}
			input {margin:01px;padding:05px;border:01px solid;width:40vw;}
			input[type="checkbox"] {margin:0px 0px 0px 110px;width:10px;}
			input::placeholder {color:black;}
			.container {margin:01px 2vw;padding:05px;border:01px;}
			.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;font-size:20px;}
			.button {margin:10px 05px;padding:05px;border:01px solid;border-radius:08px;cursor:pointer;}
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
						<!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
						<li><a href="index.html">Home</a></li>
						<li><a href="regdonor.html">Become donor</a></li>
						<li><a href="donorlist.php">Donor list</a></li>
						<li class="selected"><a href="search.php">Search donor</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="./log/login.php">Donor log in</a></li>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<div class="container">
					<div class="subheader"> Search donor near you </div>
					<form method="post">
						<label> Blood group</label>:
						<select name="bg">
							<option value="A+ve"> A+ve </option>
							<option value="A-ve"> A-ve </option>
							<option value="B+ve"> B+ve </option>
							<option value="B-ve"> B-ve </option>
							<option value="AB+ve"> AB+ve </option>
							<option value="AB-ve"> AB-ve </option>
							<option value="O+ve"> O+ve </option>
							<option value="O-ve"> O-ve </option>
						</select> <br/>
						<label> Location</label>: <input type="text" name="address" placeholder="Your thana or upzila.."/> <br/>
						<button type="submit" value="Submit" class="button"> Submit </button>
					</form>
				</div>
				<div class="container">
					<?php
						if(isset($_POST['bg'])){
							//sql query to find user information from database
							$sqlquery = "SELECT * FROM tbdonor WHERE tbdonor.dblood = '$_POST[bg]' AND tbdonor.daddress = '$_POST[address]'";
							//take data from database
							$data = mysqli_query($conect, $sqlquery);
							$row = mysqli_fetch_array($data);
							if($row){
								echo "
									<p style='text-align:center;display:block;' class='subheader'> Your desire blood donor information </p>
									<div style='display:flex;justify-content:center;flex-wrap:wrap;'>";
								do{
									echo "
										<div style='margin:05px;padding:05px;border:01px solid;display:inline-block;background:cornsilk;'>
											<label> Name </label>: $row[dname] <br/>
											<label> Mobile </label>: $row[dnumber] <br/>
											<label> Address </label>: $row[daddress] <br/>
											<label> Blood Group </label>: $row[dblood] <br/>
											<label> Last Donate </label>: $row[lddate] <br/>
											<label> Profile </label>:<a href='profile.php?key=$row[id]'> Full Profile </a>
										</div>
									";
								}while($row=mysqli_fetch_array($data));
								echo "</div>";
							}
							else{
								//sql query to find user information from database
								$sqlquery = "SELECT * FROM tbdonor WHERE tbdonor.dblood = '$_POST[bg]'";
								//take data from database
								$data = mysqli_query($conect, $sqlquery);
								$row = mysqli_fetch_array($data);
								if($row){
									echo "
									<h4 style='text-align:center;display:block;font-weight:bold;color:#777;'> Sorry, We could not found donor near you.Please find out suitable donor from bellow.</h4>
									<div style='display:flex;justify-content:center;flex-wrap:wrap;'>";
									do{
										echo "
											<div style='margin:05px;padding:05px;border:01px solid;display:inline-block;background:cornsilk;'>
												<label> Name </label>: $row[dname] <br/>
												<label> Mobile </label>: $row[dnumber] <br/>
												<label> Address </label>: $row[daddress] <br/>
												<label> Blood Group </label>: $row[dblood] <br/>
												<label> Last Donate </label>: $row[lddate] <br/>
												<label> Profile </label>:<a href='profile.php?key=$row[id]'> Full Profile </a>
											</div>
										";
									}while($row=mysqli_fetch_array($data));
									echo "</div>";
								}
								else{
									echo "<h4 style='text-align:center;display:block;font-weight:bold;color:#777;'> Sorry to inform you that the data of your desire donor did not added yet </h4>";
								}
							}
						}
						mysqli_close($conect);
					?>
				</div>
			</div>
			<div id="content_footer"></div>
			<div id="footer">
				Copyright &copy; Blood Donation | <a href="http://www.html5webtemplates.co.uk">Design by html5webtemplates</a>
			</div>
		</div>
	</body>
</html>
