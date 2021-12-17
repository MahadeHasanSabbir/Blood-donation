<?php
	//create connection with database
	$conect = mysqli_connect("localhost","root","","dbblood");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title> Search Donor who near you </title>
		<style>
			body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
			table {margin:01px;padding:05px;border:01px;text-align:center;width:95vw;border-spacing:1px;border-collapse:separate;}
			label {marin:01px;padding:05px;border:02px;display:inline-block;width:90px;font-weight:bold;}
			input {margin:01px;padding:05px;border:01px solid;width:40vw;}
			input[type="checkbox"] {margin:0px 0px 0px 110px;width:10px;}
			input::placeholder {color:black;}
			.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
			.subheader {margin:01px;padding:05px;border:02px;font-weight:bold;display:inline-block;font-size:20px;}
			.button {margin:01px;padding:05px;border:01px solid;border-radius:08px;cursor:pointer;}
		</style>
	</head>
	<body>
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
			<p style="text-align:center;display:block;" class="subheader"> Your desire blood donor information </p>
			<?php
				if(isset($_POST['bg'])){
					//sql query to find user information from database
					$sqlquery = "SELECT * FROM tbdonor WHERE tbdonor.dblood = '$_POST[bg]' AND tbdonor.daddress = '$_POST[address]'";
					//take data from database
					$data = mysqli_query($conect, $sqlquery);
					while($row=mysqli_fetch_array($data)){
						echo "
							<div style='padding:05px;border:01px solid;display:inline-block;background:cornsilk;'>
								<label> Name </label>: $row[dname] <br/>
								<label> Mobile </label>: $row[dnumber] <br/>
								<label> Address </label>: $row[daddress] <br/>
								<label> Blood Group </label>: $row[dblood] <br/>
								<label> Last Donate </label>: $row[lddate] <br/>
								<label> Profile </label>:<a href='profile.php?key=$row[id]'> Full Profile </a>
							</div>
						";
					}
					if(!$row){
						echo "Sorry, We could not found donor near you.Please find out suitable donor from bellow.<br/>";
						//sql query to find user information from database
						$sqlquery = "SELECT * FROM tbdonor WHERE tbdonor.dblood = '$_POST[bg]'";
						//take data from database
						$data = mysqli_query($conect, $sqlquery);
						while($row=mysqli_fetch_array($data)){
							echo "
								<div style='padding:05px;border:01px solid;display:inline-block;background:cornsilk;'>
									<label> Name </label>: $row[dname] <br/>
									<label> Mobile </label>: $row[dnumber] <br/>
									<label> Address </label>: $row[daddress] <br/>
									<label> Blood Group </label>: $row[dblood] <br/>
									<label> Last Donate </label>: $row[lddate] <br/>
									<label> Profile </label>:<a href='profile.php?key=$row[id]'> Full Profile </a>
								</div>
							";
						}
					}
				}
				
			?>
		</div>
	</body>
</html>