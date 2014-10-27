<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Order Form/Edit Order Form</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?session_start();?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<h2>New Order Form</h2>
	
	<?if($_SESSION['account']=="manager"){
	print '<h4>Welcome '.$_SESSION['name'].'</h4>
	<div id="nav">
		<h3>Navigation</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="home">Home Page</option>
				<option value="order">New Order Form/Edit Order Form</option>
				<option value="customer">New Customer Form/Edit Customer</option>
				<option value="manage">Management Access Only</option>
				<option value="report">Itemized Sales Report</option>
				<option value="performance">Performance Report</option>
				<option value="business">Business Report</option>
			</select>
			</div>
			<p><input type="submit" value="Submit" /></p>
		</form>
		8:00 a.m. BIT 4444<br/>
		Group 6 Team Members:<br/>
			Minahm Kim<br/>
			Andrew Knittle<br/>
			Nathan Egbert<br/>
			Marcella Krzywicki
	</div>
	';}
	else if($_SESSION['account']=="user"){
	print '<h4>Welcome '.$_SESSION['name'].'</h4>
	<div id="nav">
		<h3>Navigation</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="home">Home Page</option>
				<option value="order">New Order Form/Edit Order Form</option>
				<option value="customer">New Customer Form/Edit Customer</option>
				<option value="item">Itemize sales report</option>
			</select>
			</div>
			<p><input type="submit" value="Submit" /></p>
		</form>
		8:00 a.m. BIT 4444:<br/>
		Group 6 Team Members:<br/>
			Minahm Kim<br/>
			Andrew Knittle<br/>
			Nathan Egbert<br/>
			Marcella Krzywicki
	</div>';}
	// Establish a connection with the data source, and define the SQL
	$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

	$strSQL = "SELECT product_name, product_cost FROM product";

	$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row = mysqli_fetch_array($rs);
	// Establish a connection with the data source, and define the SQL for the orders
	$strSQL2 = "SELECT* FROM salesorder"; //WHERE emp_id == $username";

	$rs2 = mysqli_query($db, $strSQL2)  or die("Error in SQL statement: " . mysqli_error());  
	$row2 = mysqli_fetch_array($rs2)?>
	
    <?$today = date("F j, Y");?>
    <form method="POST" action="order_result.php">
		<table>
			<tr>
				<td>Order Number:</td>
				<td><input type="text" name="ordernumber" value="<?=$row2[0]?>"/></td>
				<td>Order Date:</td>
				<td><input type="text" name="orderdate" value="<?=$today?>"/></td>
			</tr>
			<tr>
				<td> Customer:</td>
				<td><input type="text" name="customer" value="<?=$row2[1]?>"/></td>
			</tr>
			<tr>
				<td>Sale Agent:</td>
				<td><input type="text" name="salesagent" value="<?=$row2[3]?>"/></td>
				<td>Order Status:</td>
				<td><input type="text" name="orderstatus" value="<?=$row2[4]?>""/></td>
			</tr>
		</table>
        <table border = "1">
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
			<?$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());?>
			<?for($x=0; $x <= 14; $x++)
			//just needs to post quantity not which
				{?>
					<?$row = mysqli_fetch_array($rs)?>
					<tr>
					<td><label ><?=$row[0]?></label>
					<input type="hidden"name="P<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="M<?=$x?>" value="<?=$row[1]?>"></input></td>
					<td><label value="$row[1]">
							<?print "<option value=$row[0]name=M$x >$row[1]</option>\n";//This is uses the datebase values?>
					<td><select name="Q<?=$x?>"  value="$row[1]">
							<?for($i = 0; $i < 10; $i++){
							print "<option value=$i>$i</option>";}//This uses the datebase values?>
							</select></td>
					</tr>
			  <?}?>
			
		</table> 
		<center>
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/>
		</center>
    </form>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>
