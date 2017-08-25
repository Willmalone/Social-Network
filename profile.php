<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/960_12_col.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	
<?php
#start session require check session once
session_start();
require_once("checkSession.php");
	#try to connect to database and retrive logged in user
	try {
        $host = '127.0.0.1';
        $dbname = 'test';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }catch(PDOException $e) {echo 'Error';}  
	$q = $DBH->prepare("select * from users_table where id = :id LIMIT 1");
    $q->bindValue(':id', $_SESSION['id']);
    $q->execute();
    $row = $q->fetch(PDO::FETCH_ASSOC);
?>
	<body>
		<div class = "container_12 clearfix">
			<img src = "images/Banner.png"/>
			<div class = "grid_6 prefix_3 suffix_3">
				</br>
				<?php
					#Display data retrieved from previous query
					echo "Name:  " . $row['fname'] . " " . $row['lname'] . "</br>";
					echo "Email: " . $row['email'] . "</br>";
					echo "Phone: " . $row['tel'] . "</br></br>";
				#Display form for comment entry
				echo '<form action = "comment.php?id=' . $_SESSION['id'] . '" method="post">
			
					<input type = "textbox" name = "comment"/>
					<input type = "submit" value = "Post!"/>

				</form>';
					#Retrive comments on logged in users page and display them one by one with like button that shows the amount of likes
					$query = $DBH->prepare("select commenter, cid, comment, likes, comment_user from users_table join comments on id = userid where userid = :id;");
					$query->bindValue(':id', $_SESSION['id']);
					$query->execute();
					$list = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach($list as $row){
						echo '<p><a href = "viewprofile.php?id=' . $row['comment_user'] . '">' . $row['commenter'] . '</a></br>' . $row['comment'] . ' <a href = like.php?id=' . $row['cid'] . '>Like!(' . $row['likes'] . ')</a></p>';
					}
				?>
				<a href = "logout.php">Logout</a>
			</div>
		</div>
	</body>
</html>