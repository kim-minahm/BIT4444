<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?
	connectDB();
	session_start();?>
		<head>
			<title>Receipt</title>
			<link rel="stylesheet" type="text/css" href="hw2.css"/>
		</head>
		<body>
		<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<?
		include ('navbar_func.php');
		echo navbar();
	?>
		<center>
				Order Number: <? echo $_POST["ordernumber"]; ?><br/>
				Order Date: <? echo $_POST["orderdate"]; ?><br/>
				Customer: <? echo $_POST["customer"]; ?><br/>
				Sales Agent: <? echo $_POST["salesagent"]; ?><br/>
				Order Status: <? echo $_POST["orderstatus"]; ?><br/>
		</center>
		<?$strItems = "SELECT product.product_name, product.product_cost,product.product_id,orderitem.item_quantity,salesorder.order_id, salesorder.cust_id,salesorder.emp_id,salesorder.status_id,salesorder.order_date FROM product 
			LEFT JOIN orderitem ON orderitem.order_id=".$_POST['ordernumber']." AND orderitem.product_id=product.product_id
			LEFT JOIN salesorder ON salesorder.order_id=".$_POST['ordernumber'];
		$strOrder = "SELECT * FROM salesorder WHERE order_id ='".$_POST['ordernumber']."'";
		try{
		$ord = @mysqli_query($db, $strItems);// or die("Error in SQL statement: " . mysqli_error());
		$order = @mysqli_fetch_array($ord);
		if(!$order){throw new Exception("Data could not be passed from edit_order.php to this one.");}
		}
		catch (Exception $e){
		// redirect to a custom error page (PHP or ASP.NET or …)
		header("Location: error.php?msg=" . $e->getMessage() . "&line=" . $e->getLine());
		}
		?>
		<p/><p/>
		<form method="post" action="hw2.php">
		<input type="hidden" name="page" value="home"/>
		<table border = "1">
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
			<?for($x=0; $x <= 19; $x++){?>
				<tr>
					<td><?= $_POST["P$x"]; ?></td>
					<td><?= $_POST["Q$x"]; ?></td>
					<?
					try{
					$check = "SELECT * FROM orderitem WHERE order_id = '".$_POST['ordernumber']."' AND product_id = '".$order[2]."'";
//					echo $check;
					$found = @mysqli_query($db,$check);
					if(!$found){throw new Exception("Could not connect to Database. No order items found.");}
					if(mysqli_num_rows($found) > 0){
//						echo "Found<br/>";
						if($_POST["Q$x"] == 0){
							$sql = "DELETE FROM orderitem WHERE order_id='".$_POST['ordernumber']."' AND product_id='".$order[2]."'";
							if (mysqli_query($db, $sql)) 
							{
								echo "Record Deleted successfully<br/>";
							}	 
							else 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($db);
							}
						}else{
							$sql = "UPDATE orderitem SET item_quantity=".$_POST['Q'.$x]." WHERE order_id='".$_POST['ordernumber']."' AND product_id='".$order[2]."'";
							if (mysqli_query($db, $sql)) 
							{
								echo "Record Updated successfully<br/>";
							}	 
							else 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($db);
							}
						}
					}else{
						echo "Not Found";
						if($_POST["Q$x"] == 0){
							echo "No Change needed<br/>";
						}else{
							$sql = "INSERT INTO orderitem (order_id, item_linenum, product_id, item_quantity, item_unitprice) VALUES ('".$_POST['ordernumber']."','".$x."','".$order[2]."','".$_POST['Q'.$x]."','".$order[1]."')";
							if (mysqli_query($db, $sql)) 
							{
								echo "Record Added successfully\n";
							}	 
							else 
							{
								echo "Error: " . $sql . "<br>" . mysqli_error($db);
							}
						}
					}
					}
					catch (Exception $e){
					// redirect to a custom error page (PHP or ASP.NET or …)
					header("Location: error.php?msg=" . $e->getMessage() . "&line=" . $e->getLine());
					}
					?>
					<td><?= $_POST["M$x"]*$_POST["Q$x"];//Since multiplication is just there to remind me what I was doing. I know it's not synatically correct.?></td>
				</tr>
				<?$order = mysqli_fetch_array($ord);
			}?>
		</table>
		<center>
		Total Cost of Order: $
		<?php
		$total = 0;
		for($x=0; $x <= 10; $x++){
					 $total = $total + ($_POST["M$x"]*$_POST["Q$x"]);
		}
		
		echo $total;
		?>
		</br>
			<input type="submit" value="Return"/>
			<!--<input type="reset" value="Reset"/>-->
		</center>
		</form>
		</body>
</html>