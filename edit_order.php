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
	
		<?
		include ('navbar_func.php');
		echo navbar();

	if(isset($_REQUEST['order_select'])){
		$strItems = "SELECT product.product_name, product.product_cost,product.product_id,orderitem.item_quantity,salesorder.order_id, salesorder.cust_id,salesorder.emp_id,salesorder.status_id,salesorder.order_date FROM product 
			LEFT JOIN orderitem ON orderitem.order_id=".$_POST['order']." AND orderitem.product_id=product.product_id
			LEFT JOIN salesorder ON salesorder.order_id=".$_POST['order'];
		$strOrder = "SELECT * FROM salesorder WHERE order_id ='".$_POST['order']."'";
		
		$ord = mysqli_query($db, $strItems) or die("Error in SQL statement: " . mysqli_error());
		$order = mysqli_fetch_array($ord);
		?><form method="POST" action="edit_order_result.php">
		<table>
			<tr>
				<td>Order Number:</td>
				<td><input type="text" name="ordernumber" value="<?=$order[4]?>"/>
				</td>
				<td>Order Date:</td>
				<td><input type="text" name="orderdate" value="<?=$order[8]?>"/></td>
			</tr>
			<tr>
				<td> Customer:</td>
				<td><input type="text" name="customer" value="<?=$order[5]?>"/></td>
			</tr>
			<tr>
				<td>Sale Agent:</td>
				<td><input type="text" name="salesagent" value="<?=$order[6]?>"/></td>
				<td>Order Status:</td>
				<td><input type="text" name="orderstatus" value="<?=$order[7]?>"/></td>
			</tr>
		</table>
        <table border = "1">
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
			<?for($x=0; $x <= 19; $x++)
			//just needs to post quantity not which
				{?>
					<tr>
					<td><label ><?=$order[0]?></label>
					<input type="hidden"name="P<?=$x?>" value="<?=$order[0]?>"></input>
					<input type="hidden"name="M<?=$x?>" value="<?=$order[1]?>"></input></td>
					<td><label value="<?=$order[1]?>">
							<?print "<option value=$order[0] name=M$x >$order[1]</option>\n";//This is uses the datebase values?>
					<td><select name="Q<?=$x?>"  value="<?=$order[1]?>">
							<?
							$val = $order[3];
							print "<option value=$val selected>$val</option>";
							?><?
							$choice=false;
							for($i = 20; $i > 0; $i--){
								if($val==$i){
									print "<option value=$val selected>$val</option>";
									$choice=true;
								}else{
									print "<option value=$i>$i</option>";
								}
							}
							if($choice==false){
								print "<option value=0 selected>0</option>";
							}else{
								print "<option value=0>0</option>";
							}?>
							
							</select></td>
					</tr>
					<?$order = mysqli_fetch_array($ord);?>
			  <?}?>
			
		</table> 
		<center>
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/>
		</center>
    </form><?
		print $strOrder;
		print $strItems;
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
		print $strSQL;
	}
	?>
	</body>
</html>