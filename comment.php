<?php
	#When post occurs
	if($_POST){
		#Start session and retrieve variables from session get and post
		session_start();
		$commenter = $_SESSION['id'];
		$commentee = $_GET['id'];
		$commenterun = $_SESSION['username'];
		$comment = $_POST['comment'];
		#validate comment is longer than 5 chars, no error message just denies the post shorter than 5
		if(strlen($comment) > 4){
			#try to connect to database and insert comment and user ids
			try {
				$host = '127.0.0.1';
				$dbname = 'test';
				$user = 'root';
				$pass = '';
				# MySQL with PDO_MYSQL
				$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
				$sql = "INSERT INTO comments(userid, comment_user, comment, commenter) VALUES (?, ?, ?, ?);";
				$sth = $DBH->prepare($sql);
				$sth->bindParam(1, $commentee, PDO::PARAM_INT);
				$sth->bindParam(2, $commenter, PDO::PARAM_INT);
				$sth->bindParam(3, $comment, PDO::PARAM_INT);
				$sth->bindParam(4, $commenterun, PDO::PARAM_INT);
				$sth->execute();
			} catch(PDOException $e) {echo $e;} 
		}
}
?>
<!--Send user back to previous page-->
<script>
   window.history.back();
</script>