<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Report</title>
	<link rel="stylesheet" href="hw2.css"/>
	
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
<?if($_SESSION['account']=="manager"){
	print '<h4>Welcome '.$_SESSION['name'].'</h4>
	<div id="nav">
		<h3>Navigation - Report</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="home">Home</option>
				<option value="order">New Order Form</option>
				<option value="edit">Edit Order Form</option>
				<option value="customer">New Customer Form/Edit Customer</option>
				<option value="manage">Management Access Only</option>
				<option value="report">Itemized Sales Report</option>
				<option value="performance">Performance Report</option>
				<option value="business">Business Report</option>
			</select>
			<input type="hidden" name="acct" value="manager"/>
			</div>
			<p><input type="submit" value="Submit" /></p>
		</form>
		8:00 a.m. BIT 4444<br/>
		Group 6 Team Members:<br/>
			Minahm Kim<br/>
			Andrew Knittle<br/>
			Nathan Egbert<br/>
			Last Modified: 9/26/2014
	
	</div>';}
	else{print '

	<h4>Welcome '.$_SESSION['name'].' <form method="POST" action="signout.php"><input type="submit" value="Logout" /></form><br /></h4>
	<hr/>
	<div id="nav">
		<h3>Navigation - User Portal</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				 <option value="home">Home</option>
				<option value="order">New Order Form</option>
				<option value="edit">Edit Order</option>
				<option value="customer">New Customer Form/Edit Customer</option>
				<option value="item">Itemize sales report</option>
			</select>
			<input type="hidden" name="acct" value="user"/>
			</div>
			<p><input type="submit" value="Submit" /></p>
		</form>
		8:00 a.m. BIT 4444:<br/>
		Group 6 Team Members:<br/>
			Minahm Kim<br/>
			Andrew Knittle<br/>
			Nathan Egbert<br/>
			Last Modified: 9/26/2014
	</div>';}?>
	// Establish a connection with the data source, and define the SQL
	$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

	$strSQL = "SELECT product_name, product_cost FROM product";

	$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row = mysqli_fetch_array($rs);
	
	
			<p>Report goes here</p>
			
		<h5>Last Modified: 9/26/2014</h5>
	</body>
</html>