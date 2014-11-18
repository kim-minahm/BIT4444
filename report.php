<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Order Form/Edit Order Form</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?
	connectDB();
	session_start();?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<?
		include ('navbar_func.php');
		echo navbar();
	
	// Establish a connection with the data source, and define the SQL

	$strSQL = "SELECT product_id, category_id, product_name, product_cost FROM product";
	$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row = mysqli_fetch_array($rs);
	
	//Establish a connection with the data source, and define the SQL specific for sales
	
	$saleSQL = "SELECT order_id, cust_id, order_date FROM salesorder";
	$rd = mysqli_query($db, $saleSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row2 = mysqli_fetch_array($rd);
	
	//Establish a connection with the data source, and define the SQL specific for sales
	
	$orderSQL = "SELECT item_quantity, item_unitprice FROM orderitem";
	$rt = mysqli_query($db, $orderSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row3 = mysqli_fetch_array($rt);
	
	//Establish a connection with the data source, and define the SQL specific for status
	
	$statusSQL = "SELECT status_type FROM orderstatus";
	$rg = mysqli_query($db, $statusSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row4 = mysqli_fetch_array($rg);
	
	// Establish a connection with the data source, and define the SQL for the orders
	
	$newID = 101;
	$rndSQL = "Select order_id FROM salesorder WHERE order_id = ".$newID;
	while(mysqli_num_rows(mysqli_query($db, $rndSQL)) > 0){
		echo "<script>console.log($newID)</script>";
		$newID++;
		$rndSQL = "Select order_id FROM salesorder WHERE order_id =". $newID;
	}
	?>
    <?$today = date("F j, Y");?>
<?
	connectDB();
	session_start();?>
		<head>
			<title>Receipt</title>
			<link rel="stylesheet" type="text/css" href="hw2.css"/>
		</head>
		<form method="post" action="new_order_result.php">
		<table>
			<tr>
				<td>Order Number:</td>
				<td><input type="text" name="ordernumber" value="<?=$newID?>"/>
				</td>
				<td>Order Date:</td>
				<td><input type="text" name="orderdate" value="<?=$today?>"/></td>
			</tr>
			<tr>
				<td> Customer:</td>
				<td><input type="text" name="customer" value=""/></td>
			</tr>
			<tr>
				<td>Sale Agent:</td>
				<td><input type="text" name="salesagent" value=""/></td>
				<td>Order Status:</td>
				<td><input type="text" name="orderstatus" value=""/></td>
			</tr>
		</table>
        <table border = "1">
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Order#</th>
				<th>CustomerID</th>
				<th>AgentID</th>
				<th>Date</th>
				<th>Status</th>
				<th>Quantity</th>
				<th>$ Total</th>
			</tr>
			<?$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());?>
			<?for($x=0; $x <= 19; $x++)
			//just needs to post quantity not which
				{?>
					<?$row = mysqli_fetch_array($rs)?>
					<tr>
					<td><label ><?=$row[0]?></label>
					<input type="hidden"name="Price<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="Order#<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="CustID<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="AgentID<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="Date<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="Status<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="Quantity<?=$x?>" value="<?=$row3[0]?>"></input>
					<input type="hidden"name="M<?=$x?>" value="<?=$row3[0]?>"></input></td>
					<td><label value="$row[1]">
							<?print "<option value=$row[3]name=M$x >$row[3]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[2]">
							<?print "<option value=$row2[0]name=Order#$x >$row2[0]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[3]">
							<?print "<option value=$row2[1]name=CustID#$x >$row2[1]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[4]">
							<?print "<option value=$row2[1]name=AgentID#$x >$row2[1]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[5]">
							<?print "<option value=$row2[2]name=Date#$x >$row2[2]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[6]">
							<?print "<option value=$row4[0]name=Status#$x >$row4[0]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[7]">
							<?print "<option value=$row3[0]name=Quantity#$x >$row3[0]</option>\n";//This is uses the datebase values?></td>
					<td><label value="$row[8]">
							<?print "<option value=$row3[1]name=M#$x >$row3[1]</option>\n";//This is uses the datebase values?></td>
					</tr>
			  <?}?>
		</table> 
		</body>
</html>