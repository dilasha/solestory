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
					include '../site_includes/header.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="row">

						<?php
						include '../site_includes/navigation.php';
						?>
					</div>
					<div class="row">
						<div class="col-md-3">

							<?php
							include '../site_includes/adv_search.php';
							?>
						</div>
						<div class="col-md-9">

							<?php
							$base = "http://localhost/solestory/admin/images/product/";
							$query = "SELECT * FROM product where 1 order by ProductID desc";
							$result = mysqli_query($conn, $query);
							$count = mysqli_num_rows($result);
							$prodcount = 0;
							echo "<div class='row'>";
							while ($row = mysqli_fetch_assoc($result)) {
								$hide = "";

								$price = $row['Price'];
								if ($row['onSale'] == "Yes") {
									$sale = $row['SalePerCent'];
									$saleAmt = $price - (($sale / 100) * $price);
									$classprev = "class='previousprice'";
								} else {
									$classprev = "";
									$hide = " style='display:none' ";
								}

								$prodID = $row['ProductID'];
								echo "<div class='col-md-4 prodThumbDiv'>";
								echo "<a href='http://localhost/solestory/site/itemdetails.php?value=" . $prodID . "'>";
								echo "<div class='row'><img class='img-responsive probThumb' src='" . $base . $row['ProductImage'] . "'></a></div>";
								echo "<div class='row'><a class='custProdName' href='http://localhost/solestory/site/itemdetails.php?value=" . $prodID . "'>" . $row['ProductName'] . "</a></div>";
								echo "<div class='row'> <span " . $classprev . ">Rs." . $price . "</span><span" . $hide . ">  Rs." . $saleAmt . "</span></div>";

								echo "</div>";

							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
