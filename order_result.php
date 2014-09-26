<title>Confirming</title>
		</head>
		<body>
			
		<table>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Food Choice</th>
			</tr>
			<tr>
				<td><?php echo $_POST["ordernumber"]; ?></td>
				<td><?php echo $_POST["orderdate"]; ?></td>
				<td><?php echo $_POST["customer"]; ?></td>
				<td><?php echo $_POST["salesagent"]; ?></td>
				<td><?php echo $_POST["orderstatus"]; ?></td>
			</tr>
		</table>
		</body>
</html>