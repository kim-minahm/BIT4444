<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>Receipt</title>
			<link rel="stylesheet" type="text/css" href="hw2.css"/>
			<?session_start()?>
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
		<p/><p/>
		<form method="post" action="hw2.php">
		<input type="hidden" name="page" value="home"/>
		<table border = "1">
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
			<?for($x=0; $x <= 10; $x++){?>
				<tr>
					<td><?= $_POST["P$x"]; ?></td>
					<td><?= $_POST["Q$x"]; ?></td>
					<td><?= $_POST["M$x"]*$_POST["Q$x"];//Since multiplication is just there to remind me what I was doing. I know it's not synatically correct.?></td>
				</tr>
			<?}?>
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