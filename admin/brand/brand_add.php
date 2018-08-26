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
						<div class="form-group">
							<label >Brand Name</label>

							<input name="txtBrandName" class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Brand Logo</label>
							<input name="imgBrandLogo" type="file">
						</div>
						<button type="submit" name="btnAddBrand" class="btn btn-default">
							Submit
						</button>
					</form>

				</div>

			</div>
		</div>

	</body>
</html>
<?php
if (isset($_POST['btnAddBrand'])) {

	$BrandName = $_POST['txtBrandName'];

	$target_dir = "../images/brands/";
	$target_file = $target_dir . basename($_FILES["imgBrandLogo"]["name"]);
	$filename=basename($_FILES["imgBrandLogo"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		$uploadOk = 0;

	}
	if ($uploadOk == 0) {
		echo "<script type='text/javascript'>alert('Invalid file type! Please select an image.');</script>";
	} else {
		if (move_uploaded_file($_FILES["imgBrandLogo"]["tmp_name"], $target_file)) {$query = "INSERT INTO brand(BrandID, BrandName, BrandLogo) VALUES('','$BrandName','$filename')";

			if (mysqli_query($conn, $query)) {
				$url = "brand_list.php";
				echo "<script>window.location='" . $url . "';</script>";
			} else
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);

		}
	}
}
?>