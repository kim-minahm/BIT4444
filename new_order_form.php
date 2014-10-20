<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Order Form/Edit Order Form</title>
	<link rel="stylesheet" href="hw2.css"/>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<h2>New Order Form</h2>
	<?if($_GET['acct']=="manager"){
	print '
	<div id="nav">
		<h3>Navigation</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="order">New Order Form/Edit Order Form</option>
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
			Nathan Egbert
	</div>
	';}
	else if($_GET['acct']=="user"){
	print '
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
			Nathan Egbert
	</div>';}?>
	
	 <?
	// Establish a connection with the data source, and define the SQL
	$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

	$strSQL = "SELECT product_name, product_cost FROM product";

	$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	?>
	<?$row = mysqli_fetch_array($rs)?>
	
	
    <form method="post" action="order_result.php">
		<input type="hidden" name="acct" value="<?=$_GET['acct'];?>"/>
		<table>
			<tr>
				<td>Order Number:</td>
				<td><input type="text" name="ordernumber"/></td>
				<td>Order Date:</td>
				<td><input type="text" name="orderdate"/></td>
			</tr>
			<tr>
				<td> Customer:</td>
				<td><input type="text" name="customer"/></td>
			</tr>
			<tr>
				<td>Sale Agent:</td>
				<td><input type="text" name="salesagent"/></td>
				<td>Order Status:</td>
				<td><input type="text" name="orderstatus"/></td>
			</tr>
		</table>
        
        <table border = "1">
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total Price</th>
			</tr>
			<tr>
				<td><input type = 'text' name = "P1"/></td>
				<td><input type = 'text' name = "Q1"/></td>
				<td><input type = 'text' name = "U1"/></td>
				<td><input type = 'text' name = "T1"/></td>
			</tr>
			<tr>
				<td><input type = 'text' name = "P2"/></td>
				<td><input type = 'text' name = "Q2"/></td>
				<td><input type = 'text' name = "U2"/></td>
				<td><input type = 'text' name = "T2"/></td>
			</tr>
			<tr>
				<td><input type = 'text' name = "P3"/></td>
				<td><input type = 'text' name = "Q3"/></td>
				<td><input type = 'text' name = "U3"/></td>
				<td><input type = 'text' name = "T3"/></td>
			</tr>
		</table> 
		<select name="preference"  value="$row[1]">
						<?while($row = mysqli_fetch_array($rs)){?>
						<?print '<option value="' . $row[0] . '">' . $row[0] . ' ' . $row[1] . '</option>' . "\n";}//This is uses the datebase values?>
		</select>
		<center>
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/>
		</center>
    </form>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>
