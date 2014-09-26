<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>Receipt</title>
			<link rel="stylesheet" type="text/css" href="hw2.css"/>
		</head>
		<body>
					<h1 align = "center"> Order Submitted:</h1>
		<center>
				Order Number: <?php echo $_POST["ordernumber"]; ?><br/>
				Order Date: <?php echo $_POST["orderdate"]; ?><br/>
				Customer: <?php echo $_POST["customer"]; ?><br/>
				Sales Agent: <?php echo $_POST["salesagent"]; ?><br/>
				Order Status: <?php echo $_POST["orderstatus"]; ?><br/>
		</center>
		<p/><p/>
		<table border = "1" width = "50%" align = "center">
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total Price</th>
			</tr>
			<tr>
				<td><?php echo $_POST["P1"]; ?></td>
				<td><?php echo $_POST["Q1"]; ?></td>
				<td><?php echo $_POST["U1"]; ?></td>
				<td><?php echo $_POST["T1"]; ?></td>
			</tr>
			<tr>
				<td><?php echo $_POST["P2"]; ?></td>
				<td><?php echo $_POST["Q2"]; ?></td>
				<td><?php echo $_POST["U2"]; ?></td>
				<td><?php echo $_POST["T2"]; ?></td>
			</tr>
			<tr>
				<td><?php echo $_POST["P3"]; ?></td>
				<td><?php echo $_POST["Q3"]; ?></td>
				<td><?php echo $_POST["U3"]; ?></td>
				<td><?php echo $_POST["T3"]; ?></td>
			</tr>
		</table>
		<h5>Last Modified: 9/26/2014</h5>
		</body>
</html>