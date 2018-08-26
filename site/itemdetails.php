<?php
session_start();

include "../connection.php";

$prodID = $_REQUEST['value'];
//echo "<script> alert('" . $prodID . "')</script>";
$query = "Select * from Product where ProductID='$prodID'";
$result = mysqli_query($conn, $query);
$base = "http://localhost/solestory/admin/images/product/";
while ($row = mysqli_fetch_assoc($result)) {

	$styleID = $row['StyleID'];
	$queryStyle = "SELECT * FROM style WHERE StyleID='$styleID'";
	$resultStyle = mysqli_query($conn, $queryStyle);
	$rowStyle = mysqli_fetch_assoc($resultStyle);

	$brandID = $row['BrandID'];
	$queryBrand = "SELECT * FROM brand WHERE BrandID='$brandID'";
	$resultBrand = mysqli_query($conn, $queryBrand);
	$rowBrand = mysqli_fetch_assoc($resultBrand);

	$prodName = $row['ProductName'];
	$imgProd = $row['ProductImage'];
	$brandLogo = $rowBrand['BrandLogo'];
	$onSale = $row['onSale'];
	$sale = $row['SalePerCent'];
	$price = $row['Price'];
	$sale = $price - (($sale / 100) * $price);
	$size = $row['Size'];
	$color = $row['Color'];
	$styleName = $rowStyle['StyleName'];
}
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
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
									<h1><?php echo $prodName; ?></h1>
								</div>
								<div class="col-md-12">
									<img class="singleItemImg" src="http://localhost/solestory/admin/images/product/<?php echo $imgProd; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<img class="brandLogo img-responsive" src="http://localhost/solestory/admin/images/brands/<?php echo $brandLogo; ?>">
								
								<label>
									<?php echo "Style:" . $styleName; ?>
								</label>
								<label>
									<?php echo "Color: " . $color; ?>
								</label>
								<label>
									<?php echo "Size: " . $size; ?>
								</label>
								<label>
									<?php echo " Price: Rs." . $price; ?>
								</label>
									<?php
									if ($onSale == "Yes") {
										echo "<label>Sale Price: Rs." . $sale . "</label>";

									}
									?>
									
						<form method="post" action="http://localhost/solestory/customer/addtocart.php">
								<input class="text" value="<?php echo $prodID; ?>" hidden name="cartProdID">
							<div class="row">
								<div class="col-md-4">									
									<div class="form=group">
										<input required placeholder="Enter Quantity" type="number" class="form-control" name="cartProdQuantity">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form=group">
										<button type="submit" name="btnAddCart" class='btn addtocart'><i class='glyphicon glyphicon-bookmark'></i> Add to cart</button>
									</div>
								 </div>
							 </div>
						</form>
					</div>

					</div>
				</div>
			</div>
		</div>
	</body>
</html>