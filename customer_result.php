<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>New Customer Processed</title>
	<link rel="stylesheet" href="hw2.css">
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk" target="_blank"><img src="http://tinyurl.com/on58dwh" border="0" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
	<hr/>
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
	<table width = "50%" align = "center">
		<tr>
			<td width = "15%">Customer ID: </td>
			<td width = "20%"><?print $customer?></td>
			<td width = "15%">Region: </td>
			<td width = "20%"><?print $region?></td>
		</tr>
		<tr>
			<td width = "15%"> Company Name: </td>
			<td width = "20%"><?print $company?></td>
		</tr>
		<tr>
			<td width = "15%"> Contact Information:</td>
		</tr>
        <tr>
			<td width = "15%"> Last Name: </td>
			<td width = "20%"><?print $lname?></td>
		</tr>
		<tr>
			<td width = "15%"> First Name: </td>
			<td width = "20%"><?print $fname?></td>
		</tr>
		<tr>
			<td width = "15%"> Street Address 1: </td>
			<td width = "20%"><?print $add1?></td>
		</tr>
		<tr>
			<td width = "15%"> Street Address 2: </td>
			<td width = "20%"><?print $add2?></td>
		</tr>
		<tr>
			<td width = "15%"> City: </td>
			<td width = "20%"><?print $city?></td>
			<td width = "15%"> State: </td>
			<td width = "20%"><?print $state?></td>
			<td width = "15%"> Zip: </td>
			<td width = "20%"><?print $zip?></td>
		</tr>
		<tr>
			<td width = "15%"> Phone: </td>
			<td width = "20%"><?print $phone?></td>
			<td width = "15%"> Fax: </td>
			<td width = "20%"><?print $fax?></td>
			<td width = "15%"> Email: </td>
			<td width = "20%"><?print $email?></td>
		</tr>
    </table>
	<h5>Last Modified: 9/26/2014</h5>
</body>
</html>