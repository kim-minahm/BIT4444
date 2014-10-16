<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Customer Form</title>
	<link rel="stylesheet" href="hw2.css"/>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<h2> Order Submitted:</h2>
		<div id="nav">
		<h3>Navigation</h3>
		<form name="form1" method="post" action="hw2.php">
			<div>
			<select name="page">
				<option value="order">New Order Form/Edit Order Form</option>
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
			Nathan Egbert
	</div>
    <form name="form1" method="post" action="customer_result.php">
	<table>
		<tr>
			<td>Customer ID: </td>
			<td><input type="text" name="custID"/></td>
			<td>Region: </td>
			<td><input type="text" name="region"/></td>
		</tr>
		<tr>
			<td> Company Name: </td>
			<td><input type="text" name="companyname"/></td>
		</tr>
		<tr>
			<td> Contact Information:</td>
		</tr>
        <tr>
			<td> Last Name: </td>
			<td><input type="text" name="lastname"/></td>
		</tr>
		<tr>
			<td> First Name: </td>
			<td><input type="text" name="firstname"/></td>
		</tr>
		<tr>
			<td> Street Address 1: </td>
			<td><input type="text" name="address1"/></td>
		</tr>
		<tr>
			<td> Street Address 2: </td>
			<td><input type="text" name="address2"/></td>
		</tr>
		<tr>
			<td> City: </td>
			<td><input type="text" name="city"/></td>
			<td> State: </td>
			<td><input type="text" name="state"/></td>
			<td> Zip: </td>
			<td><input type="text" name="zip"/></td>
		</tr>
		<tr>
			<td> Phone: </td>
			<td><input type="text" name="phone"/></td>
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
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>
