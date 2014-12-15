<? require_once("connect_to_DB.php");  // connect to furniture database
// ###################### retrieve data from database #################
connectDB();  
$sql = "SELECT product_cost FROM product WHERE product_name = ' ". $_GET["q"] ." '";
$result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());  
// ###############################################################


while($row = mysqli_fetch_array($result))
{
	print $row[0];
}
mysqli_close($db);
?>
