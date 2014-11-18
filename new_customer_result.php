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
	<?
		include ('navbar_func.php');
		echo navbar();
	?>
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
</body>
</html>