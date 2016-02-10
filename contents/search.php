<?php
include_once "session.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
	<title>Search Engine</title>
		<link type = "text/css" rel = "stylesheet"   href = "stylesheet.css">
	</head>

	<body class = "body">
	<?php  if(isset($_SESSION['username']))  { ?>
				<div class = "icons">
						<a href = "logout.php"><img src="logout.png" alt="logout"></a>
				</div>
		<div id = "wrapper">
		
			<div id = "banner">
			<h1>Get searching!</h1>
				
			</div>
			
			<div class="box">
			
			 <form  id="searchbox" action="search.php" method="GET">
				 <input type="text" name="searchbox" size="28" placeholder = "enter the title of a movie" autocomplete="on" required> 
				  <input type="submit" value="Search">
				  <input type="reset" name="Reset" value="Reset">
			</form>
		
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
			

			if(isset($_GET['searchbox'])){
				
				if($input=null){
				}
				else{
				$input = $_GET['searchbox'];
				$keyword = "SELECT ItemID, Name, Price, Description FROM PHP_Item WHERE Name LIKE '%$input%'";
				
				
					if(!($result = mysql_query($keyword, $connection))){
					print("could not execute query\n $keyword")
					or die(mysql_error());
				
				}
				 
				echo "<br><font face=\"Segoe UI Light\">Search Results for <b>$input</b></font>";
				print "<br>";
				echo  "<br><table border = '1px' align='center'>
					<thead>
					<tr>
					<th>Name</th>
					<th>Price</th>
					</tr>
					</thead>";
					
				while($row = mysql_fetch_array($result)){
				echo "<tr>";
				echo "<td><a href='http://www.mcscw3.le.ac.uk/people/nm330/php/searchresults.php?id={$row['ItemID']}'>{$row['Name']}</a></td>";
				echo	"<td><a href='http://www.mcscw3.le.ac.uk/people/nm330/php/searchresults.php?id={$row['ItemID']}'>{$row['Price']}</a></td>";
				echo	"</tr>"; 
				}
			echo "</table>";
				}
					}else{
						$input = null;
					}
					
					
					
				?>
			
				
				
			</div>
		</div>
	<?php }else header('Location: access_error.html');?>
	</body>


</html>