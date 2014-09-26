<html>
	<head><title>Piedmont Furnishings</title></head>

	<body>
		<center>
		<h1>Piedmont Furnishings</h1>
		<h2>Sales Order Analysis and Reporting System</h2>
		<br/>

		<form method="POST">
		Please Enter Password:<input type="password" name='pword'/>
		<input type="submit" value="Submit">
		</center>
	
	<?php	
		$num = 0;
		while ($num <= 2){
		
			if ($_REQUEST["pword"] == "furnish"){
				echo 'Correct Password Welcome Sales Agent';
				//<form method="post" action="SalesAgentHome.php">;
				
			} Else if ($_REQUEST["pword"] == "manager") {
				echo 'Correct Password! Welcome Manager!';
				//<form method="post" action="ManagementHome.php">;
				
			} Else {
				$num += 1;
				echo 'Wrong password, Try Again!';
			}
		}
	?>
		
		
	</body>
		
	
