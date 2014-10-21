<? $x=$_POST["numstocks"]; //number of stocks to invest in ?>

<?// what are the stock names> Textbox needed for each one?>

<form method="post" action="page2.php">

	<? for($i= 1; $i<= $x; ++$i){ ?>
		<input type="text" name="stock<?=$i?>";?>
		<? } ?>
		
<input type="hidden" name="numstocks" value="<?+$x?>" />
<input type="submit" />

</form>