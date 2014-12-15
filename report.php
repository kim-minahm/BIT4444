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
	
	$strSQL = "SELECT salesorder.order_id, salesorder.cust_id, salesorder.emp_id, salesorder.order_date, salesorder.status_id, orderitem.product_id, orderitem.item_quantity, orderitem.item_unitprice FROM salesorder LEFT JOIN orderitem
	ON salesorder.order_id = orderitem.order_id";
	$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$numrows = mysqli_num_rows($rs);
	$row = mysqli_fetch_array($rs);
	
	$dateSQL = "SELECT DISTINCT order_date FROM salesorder ORDER BY order_date ASC";
	$rd = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	$numrows = mysqli_num_rows($rd);
	//$daterow = mysqli_fetch_array($rs);
	
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
			<?while($daterow = mysqli_fetch_array($rd)){
				echo "<option value=$daterow[3]>$daterow[3]</option>";
			}?>
		</select>
		<?mysqli_data_seek($rd,0);?>
	Select End Date from the Following Options:
		</br>
		<select name="DateRangeEnd">
			<?while($daterow = mysqli_fetch_array($rd)){
				echo "<option value=$daterow[3]>$daterow[3]</option>";
			}?>
		</select>
		</br>
		</contained>
		<center><input type="submit" name="submit" value="Show Range"></center>
	</form>
	<form method="post" action="new_order_result.php">
	<table border = "1">
		<tr>
			<th>Order#</th>
			<th>Customer ID</th>
			<th>Agent ID</th>
			<th>Date</th>
			<th>Status</th>
			<th>Item #</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
		</tr>
		<?$grandTotal = 0;
		$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());
		$doc = new DomDocument();
		$root = $doc->createElement('report');
		$root = $doc->appendChild($root);
		$occ = $doc->createElement('Entry');
		$occ = $root->appendChild($occ);
		
		for($x=0; $x <= $numrows; $x++)
		//just needs to post quantity not which
			
			{
				$row = mysqli_fetch_array($rs);
				$occ = $doc->createElement('Entry');
				$occ = $root->appendChild($occ);
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
				$date_from_user = $row[3];
				if($end_date > $date_from_user && $date_from_user > $start_date){?>
					<tr>
					<td><label ><?=$row[0]?></label>
				<input type="hidden"name="Order<?=$x?>" value="<?=$row[0]?>"></input>
				<input type="hidden"name="CustID<?=$x?>" value="<?=$row[1]?>"></input>
				<input type="hidden"name="AgentID<?=$x?>" value="<?=$row[2]?>"></input>
				<input type="hidden"name="Date<?=$x?>" value="<?=$row[3]?>"></input>
				<input type="hidden"name="Status<?=$x?>" value="<?=$row[4]?>"></input>
				<input type="hidden"name="Item<?=$x?>" value="<?=$row[5]?>"></input>
				<input type="hidden"name="Quantity<?=$x?>" value="<?=$row[6]?>"></input>
				<input type="hidden"name="Price<?=$x?>" value="<?=$row[7]?>"></input></td>
				
				<?
				$child = $doc->createElement('Order');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[0]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('CustID');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[1]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('AgentID');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[2]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('Date');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[3]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('Status');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[4]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('Item');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[5]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('Quantity');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[6]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				$child = $doc->createElement('Order');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[7]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				$child = $doc->createElement('total');
				$child = $occ->appendChild($child);
			
				$value = $doc->createTextNode($row[0]);
				$value = $child->appendChild($value);
				
				//-----------------------------------
				
				
				?>
		
				<?$total = (int)$row[7]*(int)$row[6]?>
				<?$grandTotal += $total?>
				<td><label value="$row[1]">
						<?print "<option value=$row[1] name=Price$x >$row[1]</option>\n";?></td>
				<td><label value="$row[2]">
						<?print "<option value=$row[2] name=CustID$x >$row[2]</option>\n";?></td>
				<td><label value="$row[3]">
						<?print "<option value=$row[3] name=AgentID$x >$row[3]</option>\n";?></td>
				<td><label value="$row[4]">
						<?print "<option value=$row[4] name=Date$x >$row[4]</option>\n";?></td>
				<td><label value="$row[5]">
						<?print "<option value=$row[5]name=Quantity$x >$row[5]</option>\n";?></td>
				<td><label value="$row[6]">
						<?
						if($row[6] == "2"){
								echo "complete";
							} else {
								echo "on order";
							}?></td>
				<td><label value="$row[7]">
						<?print "<option value=$row[7]name=Quantity$x >$row[7]</option>\n";?></td>
				<td><label value="$total">
						<?print "<option value=$total name=M$x >$total</option>\n";?></td>
				</tr>
				<?}?>
		<?}?>
<?			$xml_string = $doc->saveXML();
		$strDoctype = "<!DOCTYPE salesregions SYSTEM \"salesregions.dtd\">";
		$xml_string1 = substr($xml_string, 0, 21);
		$xml_string2 = substr($xml_string, 22, strlen($xml_string));
		$fh = fopen("testXML.xml", 'w') or die("can't open file");  
		fwrite($fh, $xml_string1 . "\n" . $strDoctype . "\n" . $xml_string2);
		fclose($fh);
	
		$dir = dirname($_SERVER['PHP_SELF']);
		if($dir=="\\"){$dir="";}; // addresses file path issue if file is in root directory
		$address = "http://" . $_SERVER["HTTP_HOST"] . $dir . "/testXML.xml";
		print "Success! Your file is available at: <a href=\"" . $address . "\">" . $address . "</a>";
	?>	

	</table>
	<center>
		Total Sum:$<?print $grandTotal?>
	</center>
	</body>
</html>