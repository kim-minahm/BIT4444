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
	<script src="validation.js"></script>
	<script src="jquery.js"></script>
	<script type="text/javascript">
	function showUser(str){
		if(str==""){
			$("#txtHint").html("");
			return;
		}else{
			$("#txtHint").load("getemp.php?q="+str);
		};
	}
	</script>

</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<?
		include ('navbar_func.php');
		echo navbar();
	
	// Establish a connection with the data source, and define the SQL

	$strSQL = "SELECT product_name FROM product";
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
    <form name="orderform" method="post" action="new_order_result.php" onsubmit="return validate_order()">
		<table>
			<tr>
				<td>Order Number:</td>
				<td><label id="order" type="text" name="ordernumber" value="<?=$newID?>"><?=$newID?></label>
				</td>
				<td>Order Date:</td>
				<td><label type="text" name="orderdate" value="<?=$today?>"/><?=$today?></label></td>
			</tr>
			<tr>
				<td> Customer:</td>
				<td><input id="customer"type="text" name="customer" value=""/></td>
			</tr>
			<tr>
				<td>Sale Agent:</td>
				<td><input id="salesagent" type="text" name="salesagent" value=""/></td>
				<td>Order Status:</td>
				<td><input id="orderstatus" type="text" name="orderstatus" value=""/></td>
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
					<tr>
					<td>
					<select name="P<?=$x?>" onchange="showUser(this.value)">
						<option value="">Choose the product you'd like to purchase:</option>
						<?while($row = mysqli_fetch_array($rs)){?>
						<?print '<option value="'.$row[0].'">' . $row[0] . '</option>' . "\n";}//This is uses the datebase values?>
					</select>
					</td>
					<td>
					<div id="txtHint"><input type="text" name="M<?=$x?>" value="0"></input></div>
					</td>
					<td><select name="Q<?=$x?>"  value="$row[1]">
							<?for($i = 0; $i < 10; $i++){
							print "<option value=$i>$i</option>";}//This uses the datebase values?>
							</select></td>
					</tr>
					
					<? $rs = mysqli_query($db, $strSQL); //resets pointer in database.?>
			  <?}?>
		</table> 
		<center>
			<input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/>
		</center>
    </form>
</body>
</html>
