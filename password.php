<html>
<head>
	<title>Piedmont Furnishings</title>
	<link rel="stylesheet" href="hw2.css">
</head>
<body>
<center>
<h1>Piedmont Furnishings</h1>
<hr />
</center>
<br /><br /><br />

<? if (isset($_REQUEST['page1_submit'])) {
// __________________________________________________ DISPLAY PAGE 2  ?>

	<? if ($_REQUEST['pword'] == "furnish") { ?>
		<center><h2>You entered the correct password on the first try!</h2>
      	</center>
		<?header("Location: userpage.html");?>
	<? } else if ($_REQUEST['pword'] == "manager") { ?>
		<center><h2>You entered the correct password on the first try!</h2>
      	</center>
		<?header("Location: managerpage.html");?>
	<? } else { ?>
		<center><h2>Wrong Password! Try again.
		<form method="POST" action="password.php">
			Password: <input type="password" NAME="pword" /><br /><br />
			<input type="submit" name="page2_submit" value="SUBMIT" />
			<input type="reset" value="RESET" /><br />
       </form>
	</h2></center>
	<? } ?>

<? } elseif (isset($_REQUEST['page2_submit'])) {
// __________________________________________________ DISPLAY PAGE 3  ?>

	<? if ($_REQUEST['pword'] == "furnish") { ?>
		<center><h2>You entered the correct password on the first try!</h2>
      	</center>
		<?header("Location: userpage.html");?>
	<? } else if ($_REQUEST['pword'] == "manager") { ?>
		<center><h2>You entered the correct password on the first try!</h2>
      	</center>
		<?header("Location: managerpage.html");?>
	<? } else { ?>
		<center><h2>Wrong Password Again! This was your second try.
		<form method="POST" action="password.php">
			Password: <input type = "password" name="pword" /><br /><br />
			<input type="submit" name="page3_submit" value="SUBMIT" />
			<input type="reset" value="RESET" /><br />
		</form>
	</h2></center>
<? } ?>

<? } elseif (isset($_REQUEST['page3_submit'])) {
// ________________________________________________ DISPLAY FINAL PAGE  ?>

	<? if ($_REQUEST['pword'] == "furnish") { ?>
		<center><h2>You entered the correct password on the first try!</h2>
      	</center>
		<?header("Location: userpage.html");?>
	<? } else if ($_REQUEST['pword'] == "manager") { ?>
		<center><h2>You entered the correct password on the first try!</h2>
      	</center>
		<?header("Location: managerpage.html");?>
	<? } else { ?>
		<center><h2>Wrong Password Again! You're out of luck.</h2></center>
	<? } ?>
<? } else {
// ____________________________________________________________ DEFAULT  ?>

<!-- This is the first pass for the user – page 1 -->

<center><h2>Please enter your password to access this site!<br />
<form method="POST" action="password.php">
Password: <input type="password" name="pword"><br /><br />
<input type="submit" name="page1_submit" value="SUBMIT" />
<input type="reset" value="RESET" /><br />
</form>
</h2></center>

<? }
//________________________________________________________________________?>

</body>
</html>


