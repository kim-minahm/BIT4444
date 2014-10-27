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
		$strItems = "SELECT product_name, product_cost,product_id FROM product";
		$strOrder = "SELECT * FROM salesorder WHERE order_id ='".$_POST['order']."'";
		$ord = mysqli_query($db, $strOrder) or die("Error in SQL statement: " . mysqli_error());
		$order = mysqli_fetch_array($ord);
		?><form method="POST" action="order_result.php">
		<table>
			<tr>
				<td>Order Number:</td>
				<td><input type="text" name="ordernumber" value="<?=$_POST['order']?>"/>
				</td>
				<td>Order Date:</td>
				<td><input type="text" name="orderdate" value="<?=$order['order_date']?>"/></td>
			</tr>
			<tr>
				<td> Customer:</td>
				<td><input type="text" name="customer" value="<?=$order['cust_id']?>"/></td>
			</tr>
			<tr>
				<td>Sale Agent:</td>
				<td><input type="text" name="salesagent" value="<?=$order['emp_id']?>"/></td>
				<td>Order Status:</td>
				<td><input type="text" name="orderstatus" value="<?=$order['status_id']?>""/></td>
			</tr>
		</table>
        <table border = "1">
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
			<?$item = mysqli_query($db, $strItems)  or die("Error in SQL statement: " . mysqli_error());?>
			<?for($x=0; $x <= 14; $x++)
			//just needs to post quantity not which
				{?>
					<?$row = mysqli_fetch_array($item)?>
					<tr>
					<td><label ><?=$row[0]?></label>
					<input type="hidden"name="P<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="M<?=$x?>" value="<?=$row[1]?>"></input></td>
					<td><label value="<?=$row[1]?>">
							<?print "<option value=$row[0]name=M$x >$row[1]</option>\n";//This is uses the datebase values?>
					<td><select name="Q<?=$x?>"  value="<?=$row[1]?>">
							<?
							#$orderQ = "SELECT * FROM orderitem WHERE order_id='".$_POST['order']."' AND product_id='".$row[2]."'";
							$val = "0";
							if($quantity = mysqli_query($db, "SELECT * FROM orderitem WHERE order_id='".$_POST['order']."' AND product_id='".$row[2]."'")){
								$quan = mysqli_fetch_array($quantity);
								$val = $quan['item_quantity'];
							}
							?><option selected="<?=$val?>"><?=$val?></option><?
							for($i = 0; $i < 20; $i++){
							print "<option value=$i>$i</option>";}//This uses the datebase values?>
							
							</select></td>
					</tr>
			  <?}?>
			
		</table> 
		<center>
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/>
		</center>
    </form><?
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
		<?$row = mysqli_fetch_array($rs)?>
		<input type="hidden" name="order_number" value="<?= $row['order_id']?>">
		<input type="hidden" name="order_date" value="<?= $row['order_date']?>">
		<input type="hidden" name="customer" value="<?= $row['cust_id']?>">
		<input type="hidden" name="employee" value="<?= $row['emp_id']?>">
		<input type="hidden" name="status" value="<?= $row['status_id']?>">
		<select name="order">
		<option value="<?= $row['order_id']?>"><? echo "Order Number: ".$row['order_id']." Placed: ".$row['order_date'];?></option><?
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