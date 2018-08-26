<?php
session_start();

include "../connection.php";
?>
<html>
	<head>
		<title> Sole Story </title>

		<?php
		include '../site_includes/head.php';
		?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<?php
					include '../site_includes/header.php';					?>
				</div>
				<div class="col-md-10">
					<div class="row">

						<?php
						include '../site_includes/navigation.php';
						?>
					</div>

				</div>
			</div>

		</div>
	</body>
</html>