<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>New Customer Processed</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?session_start();?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
	<h2> Customer Submitted:</h2>
		<?if($_SESSION['account'] == "manager"){print '
	<h4>Welcome '.$_SESSION['name'].'</h4>
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
		$customer = $_POST['custID'];
		$region = $_POST['region'];
		$company = $_POST['companyname'];
		$lname = $_POST['lastname'];
		$fname = $_POST['firstname'];
		$add1 = $_POST['address1'];
		$add2 =$_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$phone = $_POST['phone'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
	?>
	<table>
		<tr>
			<td>Customer ID: </td>
			<td><?print $customer?></td>
			<td>Region: </td>
			<td><?print $region?></td>
		</tr>
		<tr>
			<td> Company Name: </td>
			<td><?print $company?></td>
		</tr>
		<tr>
			<td> Contact Information:</td>
		</tr>
        <tr>
			<td> Last Name: </td>
			<td><?print $lname?></td>
		</tr>
		<tr>
			<td> First Name: </td>
			<td><?print $fname?></td>
		</tr>
		<tr>
			<td> Street Address 1: </td>
			<td><?print $add1?></td>
		</tr>
		<tr>
			<td> Street Address 2: </td>
			<td><?print $add2?></td>
		</tr>
		<tr>
			<td> City: </td>
			<td><?print $city?></td>
			<td> State: </td>
			<td><?print $state?></td>
			<td> Zip: </td>
			<td><?print $zip?></td>
		</tr>
		<tr>
			<td> Phone: </td>
			<td><?print $phone?></td>
			<td> Fax: </td>
			<td><?print $fax?></td>
			<td> Email: </td>
			<td><?print $email?></td>
		</tr>
    </table>
	<form method="post" action="hw2.php">
		<input type="hidden" name="page" value="home"/>
		</br>
		<input type="submit" value="Return"/>
	</form>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>