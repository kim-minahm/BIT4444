<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>New Customer Form</title>
	<link rel="stylesheet" href="hw2.css"/>
	<script src="validation.js"></script>
	<?
	connectDB();
	session_start();?>
</head>
<body>
	<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
		<?
		include ('navbar_func.php');
		echo navbar();
	?>

    <form name="form1" method="post" action="new_customer_result.php" onsubmit="validate_customer()">
	<table>
		<tr>
		<?
			$newID = 1;
			$rndSQL = "Select cust_id FROM customer WHERE cust_id = ".$newID;
			while(mysqli_num_rows(mysqli_query($db, $rndSQL)) > 0){
				echo "<script>console.log($newID)</script>";
				$newID++;
				$rndSQL = "Select cust_id FROM customer WHERE cust_id =". $newID;
			}
		?>
			<td>Customer ID: </td>
			<td><label type='text' name="custID"  value=<?=$newID?>><?=$newID?></label>
			<td>Region: </td>
			<td><input type='text' id="region" name="region"  value="region">
			</td>
							 

		</tr>
		<tr>
			<td> Company Name: </td>
			<td><input type='text' id="company" name="companyname"  value="Company"> </td>

		</tr>
		<tr>
			<td> Contact Information:</td>
		</tr>
        <tr>
			<td> Last Name: </td>
			<td><input type='text' id="lname" name="lastname"  value="name">
			</td>

		</tr>
		<tr>
			<td> First Name: </td>
			<td><input type='text' id="fname" name="firstname"  value="name">
					</td>
		</tr>
		<tr>
		
			<td> Street Address 1: </td>
			<td><input type='text' id="addr" name="address1"  value="address1"></td>
			
		</tr>
		<tr>
			<td> Street Address 2: </td>
			<td><input type='text' name="address2"  value="address2"></td>
		</tr>
		<tr>
			<td> City: </td>
			<td><input type='text' id="city" name="city"  value="city"></td>
			<td> State: </td>
			<td><input type='text' id="state"  name="state"  value="DC">
					</td>
							
			<td> Zip: </td>
			<td><input type='text' id="zip" name="zip"  value="Zip" value="00000" ></td>
		</tr>
		<tr>
			<td> Phone: </td>
			<td><input type='text' id="phone" name="phone"  value="phone"></td>
				
			<td> Fax: </td>
			<td><input type="text" id="fax" name="fax" value="000-000-0000"/></td>
			<td> Email: </td>
			<td><input type="text" id="email" name="email" value="email@email.com"/></td>
		</tr>
    </table>
		<center>
			<p/><input type="submit" value="Submit"/>
			<input type="reset" value="Reset"/><p/>
		</center>
    </form>
</body>
</html>
