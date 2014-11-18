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

	$strSQL = "SELECT product_name, product_cost FROM product";
	$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row = mysqli_fetch_array($rs);
	
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
    <form method="post" action="order_result.php">
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
				<th>Quantity</th>
			</tr>
			<?$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());?>
			<?for($x=0; $x <= 19; $x++)
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
	<?
		print $strSQL;?>
</body>
</html>
