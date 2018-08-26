<?php
session_start();
include "connection.php";
?>
<html>
	<head>
		<title> Sole Story </title>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel='stylesheet' type="text/css" href="css/admin_style.css">
		<link rel="stylesheet" type="text/css" href="css/site_style.css">

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2 affix" id="sidebar">

					<?php
					include 'site_includes/header.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="row">
						<?php
						include 'site_includes/navigation.php';
						?>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>