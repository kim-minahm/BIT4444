<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>New Customer Processed</title>
	<link rel="stylesheet" href="hw2.css"/>
	<?session_start();
	connectDB();?>
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
		if($email ===""){
			$email = "email@email";
		}
		if($fax ===""){
			$fax = "000-000-0000";
		}
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
	<?
	try{
	$check = "SELECT cust_id FROM customer WHERE cust_id=$customer";
	$cresult = mysqli_query($db, $check);
	if(!$cresult)
	{
		throw new Exception("Could not connect to database");  
	}
	} catch (Exception $e){
	// redirect to a custom error page (PHP or ASP.NET or …)
	header("Location: error.php?msg=" . $e->getMessage() . "&line=" . $e->getLine());
	}
	if(mysqli_num_rows($cresult)===1){
		$sql = "UPDATE customer SET cust_company='".$company."' , cust_lname='".$lname."', cust_fname='".$fname."', cust_address='".$add1."', cust_city='".$city."', cust_state='".$state."', cust_zip='".$zip."'
		, region_id='".$region."', cust_phone='".$phone."', cust_fax='".$fax."', cust_email='".$email."' WHERE cust_id='".$customer."'";
		if (mysqli_query($db, $sql)) 
		{
			echo "Customer Edited successfully<br/>";
		}	 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
	}else{
		echo "Customer doesn't exist <br/>";
	}	
	?>
	<form method="post" action="hw2.php">
		<input type="hidden" name="page" value="home"/>
		</br>
		<input type="submit" value="Return"/>
	</form>
</body>
</html>