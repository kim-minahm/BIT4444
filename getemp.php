<? require_once("connect_to_DB.php");  // connect to furniture database

// ###################### retrieve data from database #################
connectDB();  
$sql = "SELECT product_cost FROM product WHERE product_name = " . $_GET["q"];
$result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());  
// ###############################################################

print "<table border='1'><tr>";
print "<th>Price</th>";
print "</tr>";

while($row = mysqli_fetch_array($result))
{
	print "<tr>";
	print "<td>" . $row['product_cost'] . "</td>";
	print "</tr>";
}
print  "</table>";

mysqli_close($db);
?>
