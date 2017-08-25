<?php
	#If post occurs retrieve variables and run validation
	if($_POST){
		$message = '';
		$username = $_POST['username'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['tel'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passconfirm = $_POST['passconfirm'];
		if(strlen($username) < 8){
			$message .= 'Please enter a valid username.  More than 8 characters.';
		}
		if($fname == ''){
			$message .= 'Please enter a First name!</br>';
		}
		if($lname == ''){
			$message .= 'Please enter a Last name!</br>';
		}
		if(!is_numeric($phone)){
			$message .= 'Please enter a valid phone number!</br>';
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$message .= 'Please enter a valid email address!</br>';
		}
		if(strlen($password) < 8){
			$message .= 'Password must be at least 8 charaters!</br>';
		}
		if(!$password == $passconfirm){
			$message .= 'Password must match Confirm Password field!</br>';
		}
	}else{
		$message = ' ';
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/960_12_col.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div class="container_12 clearfix">
			<img src = "images/Banner.png"/>
			<div class = "grid_4 prefix_4 suffix_4">
			<?php
				#If message is not empty display message else send info to storeinfo.php
				if($message != ''){
					echo $message;
				}else{
					try{	#Try to connect to the database and insert verified data
						$host = '127.0.0.1';
						$dbname = 'test';
						$user = 'root';
						$pass = '';
						$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
						$sql = 'insert into users_table(username, password, fname, lname, tel, email) values(:un,:pass,:fname,:lname,:tel,:email);';
						$itdb = $DBH->prepare($sql);
						$itdb->bindValue(':un', $username);
						$itdb->bindValue(':pass', $password);
						$itdb->bindValue(':fname', $fname);
						$itdb->bindValue(':lname', $lname);
						$itdb->bindValue(':tel', $phone);
						$itdb->bindValue(':email', $email);
						$itdb->execute();
						echo 'Registered!'. $fname . ' ' . $lname;
					}catch(PDOException $pe){ 
						echo $pe;			  
					}
				}
			?>
				<form action = "signup.php" method="post">
					Username:<input id = "input" type = "text" name = "username"/></br></br>
					First Name:<input id = "input" type = "text" name = "fname"/></br></br>
					Last Name:<input id = "input" type = "text" name = "lname"/></br></br>
					Phone:<input id = "input" type = "text" name = "tel"/></br></br>
					Email:<input id = "input" type = "text" name = "email"/></br></br>
					Password:<input id = "input" type = "password" name = "password"/></br></br>
					Confirm Password:<input id = "input" type = "password" name = "passconfirm"/></br></br>
					<input type = "submit" value = "Register"/></br>
				</form>
			</div>
		</div>
	</body>
</html>
