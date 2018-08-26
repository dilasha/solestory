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
	</head>
	<body>

		<div class="container">
			<div class="row">
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
						<div class=" col-md-7">
							<div class="form-group">
								<label>Product Name</label>
								<input name="txtProdName" type="text" class="form-control" placeholder="Enter product name">
							</div>
						</div>
						<div class=" col-md-5">
							<div class="form-group">
								<label>Product Image</label>
								<input name="imgProd" class="form-control" type="file" >
							</div>
						</div>
						<div class=" col-md-7">
							<div class="form-group">
								<label>Brand Name</label>
								<select name="ddBrand" class="form-control">
									<option value="" >--Select Brand--</option>
									<?php
									$query = "SELECT * FROM brand;";
									$result = mysqli_query($conn, $query);
									while ($row1 = mysqli_fetch_assoc($result)) {
										echo "<option value='" . $row1['BrandID'] . "'>" . $row1['BrandName'] . "</option><br />";
									}
									?>
								</select>
							</div>
						</div>
						<div class=" col-md-5">
							<div class="form-group">
								<label>Style Name</label>
								<select name="ddStyle" class="form-control">
									<option value="" >--Select Style--</option>
									<?php
									$query = "SELECT * FROM style;";
									$result = mysqli_query($conn, $query);
									while ($row1 = mysqli_fetch_assoc($result)) {
										echo "<option value='" . $row1['StyleID'] . "'>" . $row1['StyleName'] . "</option><br />";
									}
									?>
								</select>
							</div>
						</div>
						<div class=" col-md-7">
							<div class="form-group">
								<label>Size</label>
								<select name="ddSize" class="form-control">
									<option value="">--Select size--</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
						</div>
						<div class=" col-md-5">
							<div class="form-group">
								<label>Color</label>

								<div class="form-group">
									<select name="ddColor" class="form-control">
										<option  value="" >Search color</option>
										<option style=" color: white ; background-color:red" value="Red" >Red</option>
										<option style=" color: white ; background-color:blue" value="Blue" >Blue</option>
										<option style=" color: white ; background-color:green" value="Green" >Green</option>
										<option style=" color: black ; background-color:gold" value="Gold" >Gold</option>
										<option style=" color: black ; background-color:silver"value="Silver" >Silver</option>
										<option	style=" color: black ; background-color:transparent" value="Multicolor" >Multicolor</option>
										<option style=" color: black ; background-color:tan" value="Tan" >Tan</option>
										<option style=" color: black ; background-color:orange" value="Orange" >Orange</option>
										<option style=" color: white ; background-color:purple" value="Purple" >Purple</option>
										<option style=" color: black ; background-color:white" value="White" >White</option>
										<option style=" color: white ; background-color:black" value="Black" >Black</option>
										<option style=" color: black ; background-color:rgb(225, 201, 157)" value="Cream" >Cream</option>
										<option style=" color: white ; background-color:grey" value="Grey" >Grey</option>
										<option style=" color: black ; background-color:pink" value="Pink" >Pink</option>
										<option style=" color: white ; background-color:brown" value="Pink" >Brown</option>
									</select>
								</div>
							</div>
						</div>
						<div class=" col-md-6">

							<div class="form-group">
								<label>Price (Rs)</label>
								<input name="numPrice" type="number" class="form-control"placeholder="Enter Price">
							</div>
						</div>

						<div class=" col-md-3">
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input id="onSale" value="yes" name="chkOnSale" type="checkbox">
										On Sale </label>
								</div>
							</div>
						</div>
						<div class=" col-md-3">
							<div id="saleNum" class="form-group">
								<label>Sale %</label>
								<input disabled name="numSale" id="numSale" type="number" class="form-control"placeholder="Enter Sale Percentage">
							</div>
						</div>

						<script>
							document.getElementById('onSale').onchange = function() {
								document.getElementById('numSale').disabled = !this.checked;
							};
						</script>
						<div class=" col-md-12">
							<button name="btnAddProd" type="submit" class="btn btn-default">
								Submit
							</button>
						</div>

					</form>

				</div>
			</div>
		</div>

	</body>
</html>
<?php
if (isset($_POST['btnAddProd'])) {

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
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		$uploadOk = 0;

	}
	if ($uploadOk == 0) {
		echo "<script type='text/javascript'>alert('Invalid file type! Please select an image.');</script>";
	} else {
		if (move_uploaded_file($_FILES["imgProd"]["tmp_name"], $target_file)) {
			$query = "INSERT INTO product(ProductID, ProductName, BrandID, StyleID, Color, Size, Price, onSale, SalePerCent, ProductImage) VALUES('','$ProdName' ,'$BrandID',
'$StyleID','$ProdColor','$ProdSize','$ProdPrice','$ifSale','$numSale','$filename')";

			if (mysqli_query($conn, $query)) {
				$url = "product_list.php";
				echo "<script>window.location='" . $url . "';</script>";
			} else
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

}
?>