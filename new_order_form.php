<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Order Form/Edit Order Form</title>
	<link rel="stylesheet" href="hw2.css"/>
</head>
<body>
	<center>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	</center>
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
		<center>
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/>
		</center>
    </form>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>