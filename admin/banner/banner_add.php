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
		<div id="container">
			<div class="content row">
				<div class="col-md-2">
					<?php
					include '../admin_includes/sidenav.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="row">

						<?php
						include '../admin_includes/topnav.php';
						?>
					</div>
					<form method="POST" enctype="multipart/form-data">
						<table  class="table">

							<tr class="form-group">
								<td>Banner Name </td>
								<td>
								<input class="form-control" type="text" name="txtBannerName">
								</td>
							</tr>

							<tr class="form-group">
								<td> Banner Image </td>
								<td>
								<input type="file" name="imgBanner">
								</td>

							</tr>

							<tr class="form-group">
								<td>&nbsp; </td>
								<td>
								<input class="btn btn-primary" name="btnAddBanner" type="submit" value="Save">
								</td>
							</tr>

						</table>
					</form>

				</div>
			</div>
		</div>

	</body>

</html>

<?php
if (isset($_POST[btnAddBanner])) {
	$BannerName = $_POST['txtBannerName'];

	$target_dir = "../images/banners/";
	$target_file = $target_dir . basename($_FILES["imgBanner"]["name"]);
	$filename = basename($_FILES["imgBanner"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	if (isset($_POST['btnAddBanner'])) {
		$check = getimagesize($_FILES["imgBanner"]["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	}
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		$uploadOk = 0;

	}
	if ($uploadOk == 0) {
		echo "<script type='text/javascript'>alert('Invalid file type! Please select an image.');</script>";
	} else {
		if (move_uploaded_file($_FILES["imgBanner"]["tmp_name"], $target_file)) {

		}

		$query = "INSERT INTO banner VALUES('','$BannerName','$filename')";

		if (mysqli_query($conn, $query)) {
			$url = "banner_list.php";
			echo "<script>window.location='" . $url . "';</script>";
		} else
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}
?>