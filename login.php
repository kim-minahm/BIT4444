<? require_once("connect_to_DB.php");  // inserts contents of this file here  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Piedmont Furnishings</title>
	<link rel="stylesheet" href="hw2.css"/>
</head>
<body>
<?connectDB();?>
<center>
<h1><a href="http://tinyurl.com/mstgdqk"><img src="http://tinyurl.com/on58dwh" alt=" photo Untitled_zps8bfcff57.jpg"/></a></h1>
<hr />
</center>
<p/><p/><p/>
<?
//$strSQL = "SELECT * FROM product";

	//$rs = mysqli_query($db, $strSQL)  or die("Error in SQL statement: " . mysqli_error());  
	//$row = mysqli_fetch_array($rs);
	?>
<? if (isset($_REQUEST['page1_submit'])) {
// __________________________________________________ DISPLAY PAGE 2  
	$un = $_REQUEST['username'];
	$pw = $_REQUEST['pword'];
	$strSQL = "SELECT * FROM employee WHERE emp_username='".$un."' AND emp_pword='".$pw."'";
	$rs = mysqli_query($db, $strSQL);
	//means that an entry was found in the database wither username & password
	if($rs) {
		$nm = mysqli_fetch_array($rs);
		print $nm['emp_fname'];
		session_start();
		$_SESSION["username"] = $_POST['username'];
		$_SESSION["id"] = $nm['emp_id'];
		$_SESSION["name"] = $nm['emp_fname']." ".$nm['emp_lname'];
		if($nm['job_id'] == 4){
			$_SESSION["account"] = "sales";
			header("Location: home.php");
		}else{
			$_SESSION["account"] = "manager";
			header("Location: home.php");
		}
	} else { ?>
		<center><h3>Wrong Password! Try again.
		<form method="POST" action="login.php">
			Username: <input type="text" name="username"><br />
			Password: <input type="password" NAME="pword" /><br /><br />
			<input type="submit" name="page2_submit" value="SUBMIT" />
			<input type="reset" value="RESET" /><br />
       </form>
	</h3></center>
	<? } ?>
<? } elseif (isset($_REQUEST['page2_submit'])) {
// __________________________________________________ DISPLAY PAGE 3  
	$un = $_REQUEST['username'];
	$pw = $_REQUEST['pword'];
	$strSQL = "SELECT * FROM employee WHERE emp_username='".$un."' AND emp_pword='".$pw."'";
	$rs = mysqli_query($db, $strSQL);
	//means that an entry was found in the database wither username & password
	if($rs) {
		$nm = mysqli_fetch_array($rs);
		session_start();
		$_SESSION["username"] = $_POST['username'];
		$_SESSION["name"] = $nm['emp_fname']." ".$nm['emp_lname'];
		if($nm['job_id'] == 4){
			$_SESSION["account"] = "sales";
			header("Location: home.php");
		}else{
			$_SESSION["account"] = "manager";
			header("Location: home.php");
		}
	 } else { ?>
		<center><h3>Wrong Password Again! This was your second try.
		<form method="POST" action="login.php">
			Username: <input type="text" name="username"><br />
			Password: <input type = "password" name="pword" /><br /><br />
			<input type="submit" name="page3_submit" value="SUBMIT" />
			<input type="reset" value="RESET" /><br />
		</form>
	</h3></center>
<? } 

   } elseif (isset($_REQUEST['page3_submit'])) {
// ________________________________________________ DISPLAY FINAL PAGE  
	$un = $_REQUEST['username'];
	$pw = $_REQUEST['pword'];
	$strSQL = "SELECT * FROM employee WHERE emp_username='".$un."' AND emp_pword='".$pw."'";
	$rs = mysqli_query($db, $strSQL);
	//means that an entry was found in the database wither username & password
	if($rs) {
		$nm = mysqli_fetch_array($rs);
		session_start();
		$_SESSION["username"] = $_POST['username'];
		$_SESSION["name"] = $nm['emp_fname']." ".$nm['emp_lname'];
		if($nm['job_id'] == 4){
			$_SESSION["account"] = "sales";
			header("Location: home.php");
		}else{
			$_SESSION["account"] = "manager";
			header("Location: home.php");
		}
	 } else { ?>
		<center><h3>Wrong Password Again! You're out of luck.</h3></center>
	<? } 
   } else {
// ____________________________________________________________ DEFAULT  ?>

<!-- This is the first pass for the user – page 1 -->

<center><h3>Please enter your password to access this site!<br />
<form method="POST" action="login.php">
Username: <input type="text" name="username"><br />
Password: <input type="password" name="pword"><br /><br />
<input type="submit" name="page1_submit" value="SUBMIT" />
<input type="reset" value="RESET" /><br />
</form>
</h3></center>

<? }
//________________________________________________________________________?>
<h5>Last Modified: 9/26/2014</h5>
</body>
</html>


