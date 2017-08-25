<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/960_12_col.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<?php
	#Requre checkSession once create $message as blank
	require_once("checkSession.php");
	$message = '';
	#If a post occurs set $id as post username and $key as random number from 0 1000000
	if($_POST){
		$id = $_POST['username'];
		$key = rand(0, 1000000);
		#Try to connect to database and insert $key and $id
		try {
			$host = '127.0.0.1';
			$dbname = 'test';
			$user = 'root';
			$pass = '';
			# MySQL with PDO_MYSQL
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		}catch(PDOException $e){echo 'Error';}  
		
		$s = $DBH->prepare("insert into forgotpassword(rand, uid) values(?,?);");
		$s->bindValue(1, $key, PDO::PARAM_INT);
		$s->bindValue(2, $id, PDO::PARAM_INT);
		$s->execute();
		#Select from users table name of the posted id and display the link for resetting the password
		$s = $DBH->prepare("select id, fname from users_table where username = '" . $id . "' limit 1;");
		$s->execute();
		$row = $s->fetch(PDO::FETCH_ASSOC);
		$uid = $row['id'];
		$name = $row['fname'];
		$message = '<a href = >' . $name . 's Reset Link</a>';
		
	}
?>
	<body>
		<div class="container_12 clearfix">
			<img src = "images/Banner.png"/>
			<div class = "grid_4 prefix_4 suffix_4">
				</br>
				<form action = "forgotpassword.php"  method="post">
					Username<input id = "input" type="text" name="username"/></br></br>
					<input type="submit" value = "Send reset link to email."/></br></br>
				</form>	
				<?php
					#Display message
					echo $message;
				?>
			</div>
		</div>
	</body>
</html>