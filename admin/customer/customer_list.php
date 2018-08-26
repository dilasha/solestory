<?php
session_start();
include '../../connection.php';
?>
<html>
	<head>
		<title> Dashboard </title>
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
					<div class="table-responsive">
						<table class="table table-condensed">
							<tr>
								<th>S.N.</th>
								<th>Full Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Password</th>
								<th>isAdmin</th>
								<th>Delete</th>
							</tr>
							<?php

							$query = "Select * from user";
							$result = mysqli_query($conn, $query);
							$rowCount = 1;
							while ($row = mysqli_fetch_assoc($result)) {

								$idValue = $row['UserID'];
								echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . $row['FullName'] . "</td>";
								echo "<td>" . $row['UserName'] . "</td>";
								echo "<td>" . $row['Email'] . "</td>";
								echo "<td>" . $row['Password'] . "</td>";
								echo "<td>" . $row['IsAdmin'] . "</td>";

								echo "<td><a href='customer_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
								echo "</tr>";
								$rowCount++;
							}
							?>
						</table>
					</div>
				</div>

			</div>
		</div>

	</body>

</html>