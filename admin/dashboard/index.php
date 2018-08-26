<?php
session_start();
include "../../connection.php";
?>
<html>
	<head>
		<title>SoleStory</title>
		<?php
		include '../admin_includes/admin_head.php';
		?>
	</head>
	<body>

		<div id="container">
			<div class="content row">
				<div class="col-md-2">
					<?php
					include '../admin_includes/sidenav.php';
					?>
				</div>
				<div class="col-md-10">

					<?php
					include '../admin_includes/topnav.php';
					?>
					abc
				</div>

			</div>
		</div>
	</body>
</html>