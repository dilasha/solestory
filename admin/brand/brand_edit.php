<?php
session_start();
include '../../connection.php';
$query = "SELECT * FROM brand WHERE BrandID='" . $_REQUEST['id'] . "'";

$result = mysqli_query($conn, $query);
$rs = mysqli_fetch_array($result);

if (isset($_POST['btnEditBrand'])) {
	$BrandName = $_POST['txtBrandName'];

	$target_dir = "../images/brands/";
	$target_file = $target_dir . basename($_FILES["imgBrandLogo"]["name"]);
	$filename = basename($_FILES["imgBrandLogo"]["name"]);
	if ($target_file == $target_dir) {
		$target_file = $rs['BrandLogo'];
		$filename = $rs['BrandLogo'];
	}

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		$uploadOk = 0;

	}
	if ($uploadOk == 0) {
		echo "<script type='text/javascript'>alert('Invalid file type! Please select an image.');</script>";
	} else {
		if (move_uploaded_file($_FILES["imgBrandLogo"]["tmp_name"], $target_file)) {

		}$query = "UPDATE brand SET BrandName='$BrandName', BrandLogo='$filename' where BrandID='" . $_REQUEST['id'] . "'";
		$result = mysqli_query($conn, $query);
		if ($result) {
			$url = "brand_list.php";
			echo "<script>window.location='" . $url . "';</script>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}

}
?>
<html>
	<head>
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

					$base = "http://localhost/solestory/admin/images/brands/";
					?>
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label >Brand Name</label>

							<input value="<?php echo $rs['BrandName']; ?>" name="txtBrandName" class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Brand Logo</label>
							<img width="250" class="uploaded" src="<?php echo $base . $rs['BrandLogo']; ?>">
							<div class="row">
								<button type="submit" name="btnChoose" class="btn btn-default">
									Change Image
								</button>

							</div>
							<div class="row chooseimgedit">
								<div class="col-md-4">

									<?php
									if (isset($_POST['btnChoose'])) {
										echo "<input class='form-control' name='imgBrandLogo' type='file'>";
									}
									?>
								</div>
							</div>
							<button type="submit" name="btnEditBrand" class="btn btn-default">
								Submit
							</button>

					</form>
				</div>

			</div>
		</div>

	</body>
</html>