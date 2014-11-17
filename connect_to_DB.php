	<? 
	function connectDB() {   // ***** Database access *****
		global $db;  // makes this variable available outside of just the scope of this function
		$db = mysqli_connect('localhost', 'student', 'student', 'furnish') or die ("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   -   replace 'root' and 'mysql' with an appropriate username and password from your installation of MySQL
	#$db = mysqli_connect('database.hosting.vt.edu', 'bit4444u6', 'PxKghJjmGb7wELbE', 'bit444406') or die ("I cannot connect to the database because: ".mysqli_connect_error());   // connect to the database server   -   replace 'root' and 'mysql' with an appropriate username and password from your installation of MySQL
	} 
	?>
