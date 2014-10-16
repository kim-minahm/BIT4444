<? ob_start() ?>
<html>
<head>
	<title>Order Processed</title>
	<link rel="stylesheet" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
	<p>
	<?
	$page = $_POST['page'];
	$account = $_POST['acct'];
	switch($page){
	case 'user':
		header("Location: userpage.html");
		break;
	case 'manager':
		header("Location: managerpage.html");
		break;
	case 'order':
		header("Location: new_order_form.php?acct=".$account);
		break;
	case 'item':
		header("Location: item.php?acct=".$account);
		break;
	case 'customer':
		header("Location: new_customer_form.php?acct=".$account);
		break;
	case 'manage':
		header("Location: manage.php?acct=".$account);
		break;
	case 'report':
		header("Location: report.php?acct=".$account);
		break;
	case 'performance':
		header("Location: performanceData.php?acct=".$account);
		break;
	case 'business':
		header("Location: businessData.php?acct=".$account);
		break;
	default:
	}
	
	?>
	
	</body>
</html>
