<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/960_12_col.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div class = "container_12 clearfix">
			<img src = "images/Banner.png"/>
			<div class = "grid_6 prefix_3 suffix_3">
			
				<?php
					#Start session then destroy it and inform the user they have been logged out
					session_start();
					session_destroy();
					echo "Logged out!</br></br>";
					echo "<a href = 'index.php'>Login</a>";
				?>
				
			</div>
		</div>
	</body>
</html>