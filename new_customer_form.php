<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Customer Form</title>
	<link rel="stylesheet" href="hw2.css"/>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<h2> Order Submitted:</h2>
		<?if($_SESSION['account'] == "manager"){print '
	<h2>Order Submitted</h2>
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
			Marcella Krzywicki<br/>
	</div>';}
	else{print '
	<h2>Order Submitted</h2>
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
			Marcella Krzywicki
	</div>';}?>
    <form name="form1" method="post" action="customer_result.php">
	<table>
		<tr>
			<td>Customer ID: </td>
			<td><select name="custID"  value="$row[0]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[0] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
			 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
			<td>Region: </td>
			<td><select name="region"  value="$row[1]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[0] . '">' . $row[8] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
		</tr>
		<tr>
			<td> Company Name: </td>
			<td><select name="companyname"  value="$row[0]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[1] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
		</tr>
		<tr>
			<td> Contact Information:</td>
		</tr>
        <tr>
			<td> Last Name: </td>
			<td><select name="lastname"  value="$row[1]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[2] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
		</tr>
		<tr>
			<td> First Name: </td>
			<td><select name="firstname"  value="$row[2]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[3] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
		</tr>
		<tr>
					 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
			<td> Street Address 1: </td>
			<td><select name="address1"  value="$row[3]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[4] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
		</tr>
		<tr>
			<td> Street Address 2: </td>
			<td><select name="address2"  value="$row[4]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[4] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
		</tr>
		<tr>
			<td> City: </td>
			<td><select name="city"  value="$row[5]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[5] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
			<td> State: </td>
			<td><select name="state"  value="$row[6]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[6] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
							 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
			<td> Zip: </td>
			<td><select name="zip"  value="$row[7]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[7] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
		</tr>
		<tr>
					 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
			<td> Phone: </td>
			<td><select name="phone"  value="$row[8]">
					<?while($row = mysqli_fetch_array($rs)){?>
					<?print '<option value="' . $row[1] . '">' . $row[9] .   '</option>' . "\n";}//This is uses the datebase values?>
				</select></td>
				
			<td> Fax: </td>
			<td><input type="text" name="fax"/></td>
			<td> Email: </td>
			<td><input type="text" name="email"/></td>
		</tr>
    </table>
		<center>
			<p/><input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/><p/>
		</center>
    </form>
		<?	
				mysqli_free_result($rs);  // release the recordset memory resources
				mysqli_close($db);   // close the database
			?>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>
