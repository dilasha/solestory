<?php
session_start();
include '../../connection.php';
?>
<html>
	<head>
		<title>SoleStory</title>
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
					<form role="form" class="form-inline" method="post">
						<div class="form-group">
							<select class="form-control" name="ddSearchStyle">
								<option value="">--Search by Style--</option>
								<?php
								$query1 = "Select * from Style;";
								$result1 = mysqli_query($conn, $query1);

								while ($row1 = mysqli_fetch_assoc($result1)) {
									echo "<option value='" . $row1['StyleID'] . "'>" . $row1['StyleName'] . "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="Search" name="StyleSearch">

						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-condensed">
							<tr>
								<th>Product ID</th>
								<th>Product Image</th>
								<th>Product Name</th>
								<th>Brand Name</th>
								<th>Style Name</th>
								<th>Color</th>
								<th>Size</th>
								<th>Price</th>
								<th>On Sale</th>
								<th>Sale (%)</th>
								<th>Edit</th>
								<th>Delete</th>

							</tr>
							<?php
							$query = "SELECT * FROM product WHERE 1 ORDER BY ProductID desc";
							;
							if (isset($_POST['StyleSearch'])) {
								$toSearch = $_POST['ddSearchStyle'];
								if ($toSearch == null) {
									$query = $query;
								} else {

									$query = " SELECT * FROM product WHERE StyleID='$toSearch' ORDER BY ProductID desc ";

								}
							}
							$result = mysqli_query($conn, $query);
							$rowCount = 1;
							$base = "http://localhost/solestory/admin/images/product/";
							while ($row = mysqli_fetch_assoc($result)) {

								$styleID = $row['StyleID'];
								$querystyle = "SELECT StyleName FROM style WHERE StyleID='$styleID'";
								$resultstyle = mysqli_query($conn, $querystyle);
								$style = mysqli_fetch_assoc($resultstyle);
										
								$brandID = $row['BrandID'];
								$querybrand = "SELECT BrandName FROM brand WHERE BrandID='$brandID'";
								$resultbrand = mysqli_query($conn, $querybrand);
								$brand = mysqli_fetch_assoc($resultbrand);
								
								$idValue = $row['ProductID'];
								
								
								echo "<tr>";
								echo "<td>" . $rowCount . "</td>";
								echo "<td>" . "<img height=75 src='" . $base . $row['ProductImage'] . "'>" . "</td>";
								echo "<td>" . $row['ProductName'] . "</td>";
								echo "<td>" . $brand['BrandName'] . "</td>";
								echo "<td>" . $style['StyleName'] . "</td>";
								echo "<td>" . $row['Color'] . "</td>";
								echo "<td>" . $row['Size'] . "</td>";
								echo "<td>" . $row['Price'] . "</td>";
								echo "<td>" . $row['onSale'] . "</td>";
								echo "<td>" . $row['SalePerCent'] . "</td>";
								echo "<td><a href='product_edit.php?id=$idValue'> Edit </a></td>";
								echo "<td><a href='product_delete.php?id=$idValue' onclick='return ConfirmDelete()'> Delete </a></td>";
								echo "</tr>";
								$rowCount++;
							}
							?>
						</table>
					</div>
				</div>

			</div>

		</div>
		</div>
	</body>
</html>