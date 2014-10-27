<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Edit Order</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?connectDB();?>
	<?session_start();?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<h2> Edit Order:</h2>
	<?if($_SESSION['account'] == "manager"){print '
	<h4>Welcome '.$_SESSION['name'].'</h4>
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
	</div>';}
	else{print '
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
	</div>';}
	if(isset($_REQUEST['order_select'])){
		$strSQL = "SELECT * FROM salesorder";
		$rs = mysqli_query($db, $strSQL) or die("Error in SQL statement: " . mysqli_error());
	}else{
		if($_SESSION['account']=="manager"){
			$strSQL = "SELECT * FROM salesorder";
			$rs = mysqli_query($db, $strSQL) or die("Error in SQL statement: " . mysqli_error());
		}else{
			$strSQL = "SELECT * FROM salesorder WHERE emp_id=".$_SESSION['id'];
			$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());
		}
		?><div id="section">
		<form method="POST" action"edit_order.php">
		<select name="order"><?
		while($row = mysqli_fetch_array($rs)){?>
			<option value="<?= $row['order_id']?>"><? echo "Order Number: ".$row['order_id']." Placed: ".$row['order_date'];?></option>
		<?}?>
		</select>
		<br/>
		<br/>
		<input type="submit" value="Submit" name="order_select"></input>
		</form></div><?
	}
	?>
	<h5>Last Modified: 9/26/2014</h5>
	</body>
</html>