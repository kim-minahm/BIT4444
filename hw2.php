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
	switch($page){
	case 'user':
		header("Location: userpage.html");
		break;
	case 'manager':
		header("Location: manage.html");
		break;
	case 'order':
		header("Location: new_order_form.html");
		break;
	case 'item':
		header("Location: item.html");
		break;
	case 'customer':
		header("Location: new_customer_form.html");
		break;
	case 'manage':
		header("Location: manage.html");
		break;
	case 'report':
		header("Location: report.html");
		break;
	default:
	}
		break;
	
	?>
	
	</body>
</html>
