<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Customer Form</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?session_start()?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	
		<?if($_SESSION['account'] == "manager"){print '

	<h4>Welcome '.$_SESSION['name'].' <form method="POST" action="signout.php"><input type="submit" value="Logout" /></form><br /></h4>
<hr/>
<h2>New Customer Form:</h2>
	<div id="nav">
		<h3>Navigation - Manager Portal</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="home">Home</option>
				<option value="order">New Order Form</option>
				<option value="edit">Edit Order Form</option>
				<option value="customer">New Customer Form</option>
				<option value="edit_customer">Edit Customer</option>
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
			Last Modified: 10/27/2014
			
	</div>';}
	else{print '

	<h4>Welcome '.$_SESSION['name'].' <form method="POST" action="signout.php"><input type="submit" value="Logout" /></form><br /></h4>
<hr/>
<h2>New Customer Form:</h2>
	<div id="nav">
		<h3>Navigation - User Portal</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="home">Home</option>
				<option value="order">New Order Form</option>
				<option value="edit">Edit Order</option>
				<option value="customer">New Customer Form</option>
				<option value="edit_customer">Edit Customer</option>
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
			Last Modified: 10/27/2014
	</div>';}?>
	
	 <?
// Establish a connection with the data source, and define the SQL
$db = mysqli_connect("localhost", "student", "student", "furnish") or die("I cannot connect to the database because: " . mysqli_connect_error());  // connect to the database server   

$strSQL = "SELECT *FROM customer";

$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
?>
    <form name="form1" method="post" action="customer_result.php">
	<table>
		<tr>
			<td>Customer ID: </td>
			<td><input type='text' name="custID"  value="ID">
			<td>Region: </td>
			<td><input type='text' name="region"  value="region">
			</td>
							 

		</tr>
		<tr>
			<td> Company Name: </td>
			<td><input type='text' name="companyname"  value="Company"> </td>

		</tr>
		<tr>
			<td> Contact Information:</td>
		</tr>
        <tr>
			<td> Last Name: </td>
			<td><input type='text' name="lastname"  value="name">
			</td>

		</tr>
		<tr>
			<td> First Name: </td>
			<td><input type='text' name="firstname"  value="name">
					</td>
		</tr>
		<tr>
		
			<td> Street Address 1: </td>
			<td><input type='text' name="address1"  value="address1"></td>
			
		</tr>
		<tr>
			<td> Street Address 2: </td>
			<td><input type='text' name="address2"  value="address2"></td>
		</tr>
		<tr>
			<td> City: </td>
			<td><input type='text' name="city"  value="city"></td>
			<td> State: </td>
			<td><input type='text' name="state"  value="DC">
					</td>
							
			<td> Zip: </td>
			<td><input type='text' name="zip"  value="Zip"></td>
		</tr>
		<tr>
			<td> Phone: </td>
			<td><input type='text' name="phone"  value="phone"></td>
				
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
</body>
</html>
