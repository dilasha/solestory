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
		<script language="javascript">
			function ConfirmDelete() {
				return confirm("Do you want to permanently delete this style?");
			}
		</script>
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
					<div class="col-md-11 table-responsive">
						<table class="table table-condensed">
							<tr>
								<th>Brand ID</th>
								<th>Brand Name</th>
								<th>Brand Logo</th>
								<th>Edit</th>
								<th>Delete</th>

							</tr>
							<?php
							$query = "SELECT * FROM brand WHERE 1";

							$base = "http://localhost/solestory/admin/images/brands/";
							$result = mysqli_query($conn, $query);
							$rowCount = 1;
							while ($row = mysqli_fetch_assoc($result)) {

								$idValue = $row['BrandID'];
								echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . $row['BrandName'] . "</td>";
								echo "<td>" . "<img height=75 src='" . $base . $row['BrandLogo'] . "'>" . "</td>";
								echo "<td><a href='brand_edit.php?id=$idValue'> Edit </a></td>";
								echo "<td><a href='brand_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
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
