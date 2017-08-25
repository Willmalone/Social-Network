<?php
#Start the session and retrieve ids from get and session
 session_start();
 $comment_id = $_GET['id'];
 $your_user_id = $_SESSION['id'];
	#try to connect to database and update the number of likes
    try{
        $host = '127.0.0.1';
        $dbname = 'test';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		
		$sql = "update comments set likes = likes+1 where cid = " . $comment_id . ";";
		$sth = $DBH->prepare($sql);
	
		$sth->bindParam(1, $your_user_id, PDO::PARAM_INT);
		$sth->bindParam(2, $comment_id, PDO::PARAM_INT);
	
		$sth->execute();
    }catch(PDOException $e){
		echo $e;
	} 
?>
<!--Send user back to previous page-->
<script>
   window.history.back();
</script>