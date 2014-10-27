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
		header("Location: home.php");
		break;
	case 'manager':
		header("Location: home.php");
		break;
	case 'home':
		header("Location: home.php");
		break;
	case 'order':
		header("Location: new_order_form.php");
		break;
	case 'edit':
		header("Location: edit_order.php");
		break;
	case 'item':
		header("Location: item.php?acct=");
		break;
	case 'customer':
		header("Location: new_customer_form.php");
		break;
	case 'manage':
		header("Location: manage.php");
		break;
	case 'report':
		header("Location: report.php");
		break;
	case 'performance':
		header("Location: performanceData.php");
		break;
	case 'business':
		header("Location: businessData.php");
		break;
	default:
	}
	
	?>
	
	</body>
</html>
