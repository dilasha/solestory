<?php
session_start();
include '../../connection.php';
?>
<html>
	<head>
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

		<div class="container">
			<div class="row">
				<div class="col-md-2 sidenav">
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
								<th>Style Name</th>
								<th>Style Description</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php
							$query = "SELECT * FROM style";
							$result = mysqli_query($conn, $query);
							$rowCount = 1;
							while ($row = mysqli_fetch_assoc($result)) {

								$idValue = $row['StyleID'];
								echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . $row['StyleName'] . "</td>";
								echo "<td>" . $row['StyleDesc'] . "</td>";
								echo "<td><a href='style_edit.php?id=$idValue'> Edit </a></td>";
								echo "<td><a href='style_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
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