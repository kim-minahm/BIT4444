<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>Receipt</title>
			<link rel="stylesheet" type="text/css" href="hw2.css"/>
		</head>
		<body>
		<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
		<hr/>
		<h2> Order Submitted:</h2>
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
			Nathan Egbert<br/>
			Marcella Krzywicki
	</div>
		<center>
				Order Number: <?php echo $_POST["ordernumber"]; ?><br/>
				Order Date: <?php echo $_POST["orderdate"]; ?><br/>
				Customer: <?php echo $_POST["customer"]; ?><br/>
				Sales Agent: <?php echo $_POST["salesagent"]; ?><br/>
				Order Status: <?php echo $_POST["orderstatus"]; ?><br/>
		</center>
		<p/><p/>
		<form method="post" action="hw2.php">
		<input type="hidden" name="acct" value="<?=$_POST['acct'];?>"/>
		<input type="hidden" name="page" value="<?=$_POST['acct'];?>"/>
		<table border = "1">
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
			<?for($x=0; $x <= 10; $x++){?>
				<tr>
					<td><?php echo $_POST["P$x"]; ?></td>
					<td><?php echo $_POST["Q$x"]; ?></td>
					<td><?php echo $_POST["T$x"]; ?></td>
				</tr>
			<?}?>
		</table>
		<center>
			<input type="submit" value="Return"/>
			<!--<input type="reset" value="Reset"/>-->
		</center>
		</form>
		<?$today = date("F j, Y, g:i a");?>
		<?print $today?>
		<h5>Last Modified: 9/26/2014</h5>
		</body>
</html>