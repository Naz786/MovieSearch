
<?php
#Session
include_once 'session.php';
		
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
			

		$username = $_POST["username"];
		$password = $_POST["password"];	
		
		
		
		
		/*if (isset($_POST['rememberme'])) {
				    //this will set cookie to last 1 whole year 
				    setcookie('username', $username, time()+60*60*24*365);
				} else {
				    //this makes cookie expire when browser is closed 
				    setcookie('username', "", false);
				}*/
		
		if($username ==null||$password==null){
			header('location: http://www.mcscw3.le.ac.uk/people/nm330/php/error.html');
		}

		# query at $db
		$sql = mysql_query("SELECT  *  FROM PHP_Customer WHERE Username = '$username' AND Password = '$password'"); 
		if (!($sql)){
			print("Could not execute query\n $sql");
			die(mysql_error());
			}
			
		if(mysql_num_rows($sql )>0){
			$row = mysql_fetch_row($sql );
			$username = $row[0];
			$_SESSION['username']=$username; 
		
			header('Location: logged.php');
			}
			
			else if(mysql_num_rows($sql)<=0){
			header("location: http://www.mcscw3.le.ac.uk/people/nm330/php/error.html");  
			}
			
			
		
	# close connection
	mysql_close($connection);

?>