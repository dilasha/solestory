<?php
session_start();
include '../../connection.php';
?>
<html>
	<head>
		<title> SoleStory </title>
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
					<div class="table-responsive">
						<table class="table table-condensed">
							<tr>
								<th>Banner ID</th>
								<th>Banner Name</th>
								<th>Banner Image</th>
								<th>Edit</th>
								<th>Delete</th>

							</tr>
							<?php
							
					$base="http://localhost/solestory/admin/images/banners/";
							$query = "SELECT * FROM banner WHERE 1;";
							$result = mysqli_query($conn, $query);
							$rowCount = 1;
							while ($row = mysqli_fetch_assoc($result)) {
								$idValue = $row['BannerID'];
								echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . $row['BannerName'] . "</td>";
								echo "<td>" . "<img height=75 src='" . $base .$row['BannerImage'] . "'>" . "</td>";
								echo "<td><a href='banner_edit.php?id=$idValue'> Edit </a></td>";
								echo "<td><a href='banner_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
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