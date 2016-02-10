<?php
include_once "session.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
	<title>Results</title>
		<link type = "text/css" rel = "stylesheet"   href = "stylesheet.css">
	</head>

	<body class = "body">
	<?php  if(isset($_SESSION['username']))   { ?>
				<div class = "icons">
						<a href = "logout.php"><img src="logout.png" alt="logout"></a>
						
						<a href="search.php"><img src ="radiosearch.png" alt="search_pic"/></a><br/>
				</div>
				
		<div id = "wrapper">
	
			<div id = "results">
					<?php
				# your credentials
				global $connection;
				$user = "nm330";
				$pass = "nicelyss";
				$server = "mysql.mcscw3.le.ac.uk";
				if (!($connection =mysql_connect($server,
				$user, $pass)))
				die ("Could not connect to database
				server");
				$db = "nm330";
				if (!(mysql_select_db($db, $connection)))
				die ("Could not open database $db");
		
				$br = "<br>";
				$allname = $_GET['id'];
				$gettingresult = "SELECT * FROM PHP_Item WHERE ItemID = '$allname'";
				
					if(!($result = mysql_query($gettingresult, $connection))){
					print("could not execute query \n $keyword")
					or die(mysql_error()); 
					}
				
				while($row = mysql_fetch_array($result)){
				echo $row['Name'];
				echo "Price: ".$row['Price'].$br.$br;
				echo "Description: ".$row['Description'];
				
				$img = $row['Image'];
				echo "<img src = '$img' alt = 'pictures' text-align:'center'/>";
				
				mysql_close($connection);
				  
				}
				
				?>

			</div>
			
			
			
		</div>
<?php }else header('Location: access_error.html');?>
	</body>


</html>