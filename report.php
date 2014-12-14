<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Itemized Sales Report</title>
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
	
	$saleSQL = "SELECT order_id, cust_id, order_date, emp_id, status_id FROM salesorder";
	$rd = mysqli_query($db, $saleSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row2 = mysqli_fetch_array($rd);
	
	//Establish a connection with the data source, and define the SQL specific for sales
	
	$orderSQL = "SELECT item_quantity, item_unitprice FROM orderitem";
	$rt = mysqli_query($db, $orderSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$row3 = mysqli_fetch_array($rt);
	
	// Establish a connection with the data source, and define the SQL for the orders
	
	$newID = 101;
	$rndSQL = "Select order_id FROM salesorder WHERE order_id = ".$newID;
	while(mysqli_num_rows(mysqli_query($db, $rndSQL)) > 0){
		echo "<script>console.log($newID)</script>";
		$newID++;
		$rndSQL = "Select order_id FROM salesorder WHERE order_id =". $newID;
	}
	?>
		<head>
			<title>Receipt</title>
			<link rel="stylesheet" type="text/css" href="hw2.css"/>
		</head>
		<contained><form action="#" method="post"></br>
		Select Start Date from the Following Options:
            <select name="DateRange">
				<option value="2011-07-21">2011-07-21</option>
				<option value="2011-07-31">2011-07-31</option>
				<option value="2011-08-06">2011-08-06</option>
				<option value="2011-08-12">2011-08-12</option>
			</select>
		Select End Date from the Following Options:
			</br>
			<select name="DateRangeEnd">
				<option value="2011-08-16">2011-08-16</option>
				<option value="2011-08-10">2011-08-10</option>
				<option value="2011-07-30">2011-07-30</option>
				<option value="2011-07-26">2011-07-26</option>
			</select>
			</br>
			</contained>
			<center><input type="submit" name="submit" value="Show Range"></center>
        </form>
		<form method="post" action="new_order_result.php">
        <table border = "1">
			<tr>
				<th>Order#</th>
				<th>Product</th>
				<th>Price</th>
				<th>CustomerID</th>
				<th>AgentID</th>
				<th>Date</th>
				<th>Status</th>
				<th>Quantity</th>
				<th>$ Total</th>
			</tr>
			<?$grandTotal = 0?>
			<?$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());?>
			<?for($x=0; $x <= 19; $x++)
			//just needs to post quantity not which
				{?>
					<?$row = mysqli_fetch_array($rs)?>
					<?$row2 = mysqli_fetch_array($rd)?>
					<?$row3 = mysqli_fetch_array($rt)?>
					<?php 
					//works for php 5.3
					if(isset($_POST['submit']))
					{
						$start_date = $_POST['DateRange'];
						$end_date = $_POST['DateRangeEnd'];
					}
					else
					{
						$start_date = '2011-07-01';
						$end_date = '2011-08-16';
					}
					$date_from_user = $row2[2];?>
					<?if($end_date > $date_from_user && $date_from_user > $start_date){?>
						<tr>
						<td><label ><?=$row2[0]?></label>
					<input type="hidden"name="Product<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="Price<?=$x?>" value="<?=$row[0]?>"></input>
					<input type="hidden"name="CustID<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="AgentID<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="Date<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="Status<?=$x?>" value="<?=$row2[0]?>"></input>
					<input type="hidden"name="Quantity<?=$x?>" value="<?=$row3[0]?>"></input>
					<input type="hidden"name="M<?=$x?>" value="<?=$row3[0]?>"></input></td>
					<?$total = (int)$row3[0]*(int)$row[3]?>
					<?$grandTotal += $total?>
					<td><label value="$row[9]">
							<?print "<option value=$row[0]name=Product$x >$row[0]</option>\n";?></td>
					<td><label value="$row[2]">
							<?print "<option value=$row[3]name=Price$x >$row[3]</option>\n";?></td>
					<td><label value="$row[3]">
							<?print "<option value=$row2[1]name=CustID$x >$row2[1]</option>\n";?></td>
					<td><label value="$row[4]">
							<?print "<option value=$row2[3]name=AgentID$x >$row2[3]</option>\n";?></td>
					<td><label value="$row[5]">
							<?print "<option value=$row2[2]name=Date$x >$row2[2]</option>\n";?></td>
					<td><label value="$row[6]">
							<?php
							if($row2[4] == "2"){
									echo "complete";
								} else {
									echo "on order";
								}?></td>
					<td><label value="$row[7]">
							<?print "<option value=$row3[0]name=Quantity$x >$row3[0]</option>\n";?></td>
					<td><label value="$row[8]">
							<?print "<option value=$total name=M$x >$total</option>\n";?></td>
					</tr>
					<?}?>
			  <?}?>
		</table>
		<center>
			Total Sum:$<?print $grandTotal?>
		</center>
		</body>
</html>