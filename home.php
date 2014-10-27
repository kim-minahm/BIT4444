<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Manager Portal</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?session_start()?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<?if($_SESSION['account'] == "manager"){print '
	<div class="boxed">
	<h1>Manager Portal</h1>
	<h4>Welcome '.$_SESSION['name'].' <input type="submit" value="Logout" /><br /></h4>
	</div>
	<div id="nav">
		<h3>Navigation</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
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
			Marcella Krzywicki<br/>
	</div>';}
	else{print '
	<h2>User Homepage</h2>
	<h4>Welcome '.$_SESSION['name'].'</h4>
	<div id="nav">
		<h3>Navigation</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="order">New Order Form/Edit Order Form</option>
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
			Marcella Krzywicki
	</div>';}?>
	<div id="section">
		<center>
			This project has been designed and developed by Minahm Kim, Nathan Egbert, Andrew Knittle, and Marcella Krzywicki.
		</center>
		Building a web based decision support system (DSS) to assist managers and sales staff at Piedmont Furnishings with sale orders, customer forms, 
		itemized sales report, and performance/business analysis reports. This web based DSS is designed to help the day-to-day activities at Piedmont 
		Furnishings be more organized and streamline sales for the managers and sales staff to prevent errors and increase customer’s satisfaction. 
	</div>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>