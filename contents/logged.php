<?php 
require 'session.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

	<head>
	<title>Welcome</title>
		<link type = "text/css" rel = "stylesheet"   href = "stylesheet.css">
	</head>

	<body class = "body">
		<?php  if(isset($_SESSION['username']))  { ?>
				<div class = "icons">
					<a href = "logout.php"><img src="logout.png" alt="logout"></a>
				</div>
		<div id = "wrapper">
				
				
			<div id = "banner">
			<h1>Welcome <?php echo $_SESSION['username'].","; ?> <br>you have successsfully logged in.</h1>
			</div>
					
			<div class="box">
				
				<div id = "banner">
					<h2>To start searching, click below!</h2>
					<a href="search.php"><img src ="radiosearch.png" alt="search_pic"/></a>
				</div>
				
				
			</div>
				
			
		</div>
	<?php }else header('Location: access_error.html');?>
	</body>


</html>