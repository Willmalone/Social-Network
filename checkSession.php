<?php
#Check to see if we should kill the session
$limit = 30*60;
if(time() >= $_SESSION['time']+$limit){
	session_destroy();
	echo '<script>window.location.assign("index.php");</script>';
}
?>



