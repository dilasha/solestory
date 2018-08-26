<?php

session_start();
include '../../connection.php';

$query = "SELECT * FROM product WHERE ProductID='" . $_REQUEST['id'] . "'";

$result = mysqli_query($conn, $query);
$rs = mysqli_fetch_array($result);

if (isset($_POST['btnEditProd'])) {
	$ProdName = $_POST['txtProdName'];
	$BrandID = $_POST['ddBrand'];
	$StyleID = $_POST['ddStyle'];
	$ProdColor = $_POST['ddColor'];
	$ProdSize = $_POST['ddSize'];
	$ProdPrice = $_POST['numPrice'];
	$ifSale = "No";
	$numSale = 0;
	if (isset($_POST['chkOnSale'])) {
		$ifSale = "Yes";
		$numSale = $_POST['numSale'];
	}

	$target_dir = "../images/product/";
	$target_file = $target_dir . basename($_FILES["imgProd"]["name"]);

	$filename = basename($_FILES["imgProd"]["name"]);

	if ($target_file == $target_dir) {
		$filename = $rs['ProductImage'];
		$target_file = $rs['ProductImage'];
	}
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		$uploadOk = 0;

	}
	if ($uploadOk == 0) {
		echo "<script type='text/javascript'>alert('Invalid file type! Please select an image.');</script>";
	} else {
		if (move_uploaded_file($_FILES["imgProd"]["tmp_name"], $target_file)) {

		}$query = "UPDATE product SET ProductName='$ProdName', BrandID='$BrandID', StyleID='$StyleID', Color='$ProdColor', Size='$ProdSize', Price='$ProdPrice', onSale='$ifSale', SalePerCent='$numSale', ProductImage='$filename' where ProductID='" . $_REQUEST['id'] . "'";
		$result = mysqli_query($conn, $query);
		if ($result) {
			$url = "product_list.php";
			echo "<script>window.location='" . $url . "';</script>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}

}
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
					<form method="post" enctype="multipart/form-data">
						<div class="col-md-7">
							<div class="form-group">
								<label>Product Name</label>
								<input value="<?php echo $rs['ProductName']; ?>" name="txtProdName" type="text" class="form-control" placeholder="Enter product name">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">

								<?php	$base = "http://localhost/solestory/admin/images/product/"; ?>
								<label>Product Image</label><img height="150" class="uploaded" src="<?php echo $base . $rs['ProductImage']; ?>">

								<div class="row">
									<button type="submit" name="btnChooseImg" class="btn btn-default">
										Change Image
									</button>
								</div>

								<div class="row chooseimgedit">
									<div class ="col-md-8">
										<?php
										if (isset($_POST['btnChooseImg'])) {
											echo "<input class='form-control' name='imgProd' type='file'>";
										}
										?>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">
								<label>Brand Name</label>
								<select name="ddBrand" class="form-control">
									<option value="" >--Select Brand--</option>
									<?php
									$query = "SELECT * FROM brand;";
									$result = mysqli_query($conn, $query);

									while ($row1 = mysqli_fetch_assoc($result)) {
										$selected = "";
										if ($rs['BrandID'] == $row1['BrandID']) {
											$selected = "selected";
										}
										echo "<option " . $selected . " value='" . $row1['BrandID'] . "'>" . $row1['BrandName'] . "</option><br />";
									}
									?>
								</select>
							</div>

						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Style Name</label>
								<select name="ddStyle" class="form-control">
									<option value="" >--Select Style--</option>
									<?php
									$query = "SELECT * FROM style;";
									$result = mysqli_query($conn, $query);

									while ($row1 = mysqli_fetch_assoc($result)) {
										$selected = "";
										if ($rs['StyleID'] == $row1['StyleID']) {

											$selected = "selected";
										}
										echo "<option " . $selected . " value='" . $row1['StyleID'] . "'>" . $row1['StyleName'] . "</option><br />";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-7">
							<?php $selected = "selected"; ?>
							<div class="form-group">
								<label>Size</label>
								<select name="ddSize" class="form-control">

									<option value="">--Select size--</option>
									<option <?php
										if ($rs['Size'] == 5) {echo $selected;
										}
 ?> value="5">5</option>
									<option <?php
										if ($rs['Size'] == 6) {echo $selected;
										}
 ?>  value="6">6</option>
									<option  <?php
										if ($rs['Size'] == 7) {echo $selected;
										}
 ?> value="7">7</option>
									<option  <?php
										if ($rs['Size'] == 8) {echo $selected;
										}
 ?> value="8">8</option>
									<option  <?php
										if ($rs['Size'] == 9) {echo $selected;
										}
 ?> value="9">9</option>
									<option  <?php
										if ($rs['Size'] == 10) {echo $selected;
										}
 ?> value="10">10</option>
									<option  <?php
										if ($rs['Size'] == 11) {echo $selected;
										}
 ?> value="11">11</option>
									<option  <?php
										if ($rs['Size'] == 12) {echo $selected;
										}
 ?> value="12">12</option>
								</select>
							</div>

						</div>

						<div class="col-md-5">
							<label>Color</label>
							<div class="form-group">

								<select name="ddColor" class="form-control">
									<option  value="" >--Select color--</option>
									<option style=" color: white ; background-color:red" value="Red" <?php
										if ($rs['Color'] == "Red") {echo $selected;
										}
 ?>  >Red</option>
									<option style=" color: white ; background-color:blue" value="Blue" <?php
										if ($rs['Color'] == "Blue") {echo $selected;
										}
 ?>  >Blue</option>
									<option style=" color: white ; background-color:green" value="Green" <?php
										if ($rs['Color'] == "Green") {echo $selected;
										}
 ?>>Green</option>
									<option style=" color: black ; background-color:gold" value="Gold"  <?php
										if ($rs['Color'] == "Gold") {echo $selected;
										}
 ?> >Gold</option>
									<option style=" color: black ; background-color:silver"value="Silver"  <?php
										if ($rs['Color'] == "Silver") {echo $selected;
										}
 ?> >Silver</option>
									<option	style=" color: black ; background-color:transparent" value="Multicolor"  <?php
										if ($rs['Color'] == "Multicolor") {echo $selected;
										}
 ?> >Multicolor</option>
									<option style=" color: black ; background-color:tan" value="Tan" <?php
										if ($rs['Color'] == "Tan") {echo $selected;
										}
 ?>  >Tan</option>
									<option style=" color: black ; background-color:orange" value="Orange" <?php
										if ($rs['Color'] == "Orange") {echo $selected;
										}
 ?>  >Orange</option>
									<option style=" color: white ; background-color:purple" value="Purple" <?php
										if ($rs['Color'] == "Purple") {echo $selected;
										}
 ?>  >Purple</option>
									<option style=" color: black ; background-color:white" value="White" <?php
										if ($rs['Color'] == "White") {echo $selected;
										}
 ?>  >White</option>
									<option style=" color: white ; background-color:black" value="Black" <?php
										if ($rs['Color'] == "Black") {echo $selected;
										}
 ?>  >Black</option>
									<option style=" color: black ; background-color:rgb(225, 201, 157)" value="Cream" <?php
										if ($rs['Color'] == "Cream") {echo $selected;
										}
 ?>  >Cream</option>
									<option style=" color: white ; background-color:grey" value="Grey"  <?php
										if ($rs['Color'] == "Grey") {echo $selected;
										}
 ?> >Grey</option>
									<option style=" color: black ; background-color:pink" value="Pink"  <?php
										if ($rs['Color'] == "Pink") {echo $selected;
										}
 ?> >Pink</option>
									<option style=" color: white ; background-color:brown" value="Pink" <?php
										if ($rs['Color'] == "Brown") {echo $selected;
										}
 ?>  >Brown</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Price (Rs)</label>
								<input  value="<?php echo $rs['Price']; ?>" name="numPrice" type="number" class="form-control"placeholder="Enter Price">
							</div>
						</div>

						<div class="col-md-3">
							<?php
							$checked = "";
							$style = "style='display: none'";

							if ($rs['onSale'] == "Yes") {
								$checked = "checked";
								$style = "";
							}
							?>
							<div class="checkbox">
								<label>
									<input <?php echo $checked; ?> id="onSale" value="yes" name="chkOnSale" type="checkbox">
									On Sale </label>
							</div>
							<script>
								$('#onSale').live('change', function() {
									if ($(this).is(':checked')) {
										$('#saleNum').show();
									} else {
										$('#saleNum').hide();
									}
								});
							</script>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<div <?php echo $style; ?> id="saleNum" class="form-group">
									<label>Sale %</label>
									<input value="<?php echo $rs['SalePerCent']; ?>" name="numSale" type="number" class="form-control"placeholder="Enter Sale Percentage">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<button name="btnEditProd" type="submit" class="btn btn-default">
								Submit
							</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</body>
</html>