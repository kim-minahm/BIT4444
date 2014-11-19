<?  require_once("connect_to_DB.php");

$outputFile = "testFile" . date("m-d-Y") . ".html";  // Dynamically names the new file

// Opens a file with this name to which to write the HTML on the server
$fh = fopen($outputFile, 'w') or die("can't open file");  // 'w' writes over any old data and creates a new file if the file doesn't already exist

// You can format the final output by including appropriate \n and \t characters in the text string
// Breaking the string you are building into pieces can also be helpful for keeping track of it....
$strOut = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";

// append the next set of tags and text onto the existing string
$strOut .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";  
$strOut .= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n\t<head>\n\t\t<title>Dynamic HTML example</title>\n\t</head>\n";
$strOut .= "\t<body>";

// ** Get data from the database and load it into an HTML table, within the string you are building **
connectDB();
$sql = "SELECT order_id, cust_id, emp_id, order_date, status_id FROM salesorder";
$result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());  // create the appropriate recordset

$strOut .= "\n\t\t<table>";
$strOut .= "\n\t\t\t<tr><td>" . "Order ID" . "</td><td>" . "Customer ID" . "</td><td>" . "Employee ID" . "</td><td>" . "Order Date" . "</td><td>" . "Status ID" . "</td></tr>";
while($row = mysqli_fetch_array($result)){  // retrieve each row of the recordset in turn
$strOut .= "\n\t\t\t<tr><td>" . $row["order_id"] . "</td><td>" . $row["cust_id"] . "</td><td>" . $row["emp_id"] . "</td><td>" . $row["order_date"] . "</td><td>" . $row["status_id"] . "</td></tr>";
}
$strOut .= "\n\t\t</table>";
mysqli_close($db);  // Always close the database connection
//***************************************************************************
$strOut .= "\n\t</body>\n</html>";

fwrite($fh, $strOut);  // Write the text string to the dynamically-named text file on the server
fclose($fh);  // Close the connection to the text file

$dir = dirname($_SERVER['PHP_SELF']);
if($dir=="\\"){$dir="";}; // addresses file path issue if file is in root directory
$address = "http://" . $_SERVER["HTTP_HOST"] . $dir . "/" . $outputFile;
print "Success! Your file is available at: <a href=\"" . $address . "\">" . $address . "</a>";
?>
