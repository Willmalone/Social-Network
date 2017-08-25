<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/960_12_col.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
<?php
#Start the session, If post occurs set retrive posted variables
session_start();
if($_POST){
	#These variables are validated by checking them against data inside the database
    $username = $_POST['username'];
    $password = $_POST['password'];
    #Try to connect to database and find given username and password
    try {
        $host = '127.0.0.1';
        $dbname = 'test';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }catch(PDOException $e){echo 'Error';}  
    $q = $DBH->prepare("select * from users_table where username = :username and password = :password LIMIT 1");
    $q->bindValue(':username', $username);
    $q->bindValue(':password', $password);
    $q->execute();
    $row = $q->fetch(PDO::FETCH_ASSOC);
    $message = '';
	#If a user matches the query add the id and time to session variables and send the user to their profile else display invalid credentials
    if (!empty($row)){
        $_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['time'] = time();
		echo '<script>window.location.assign("profile.php?id='.$_SESSION['id'].'")</script>';
    } else {
         $message= 'Invalid credentials!';
    }
}
?>
	<body>
		<div class="container_12 clearfix">
			<img src = "images/Banner.png"/>
			<div class = "grid_4 prefix_4 suffix_4">
				<h3>Login</h3></br>
				<div class = "error">
					<?php
						#If message is not empty display message
						if(!empty($message)){
							echo $message . ' </br></br>';
						}
					?>
				</div>
				<form action = "index.php"  method="post">
					Username <input id = "input" type="text" name="username"/></br></br>
					Password <input id = "input" type="password" name="password"/></br></br>
					<input type="submit" value = "Login"/></br></br>
				</form>	
				<a href = "signup.php">Not a user? Sign Up!</a>
				<a href = "forgotpassword.php" id = "input">Forgot Password?</a>			
			</div>
		</div>
	</body>
</html>
