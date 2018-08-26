<?php
session_start();
include '../../connection.php';
$query = "SELECT * FROM banner WHERE BannerID='" . $_REQUEST['id'] . "'";
$result = mysqli_query($conn, $query);
$rs = mysqli_fetch_array($result);
if (isset($_POST['btnEditBanner'])) {
	$BannerName = $_POST['txtBannerName'];
	$target_dir = "../images/banners/";
	$target_file = $target_dir . basename($_FILES["imgBanner"]["name"]);
	$filename = basename($_FILES["imgBanner"]["name"]);
	if ($target_file == $target_dir) {
		$target_file = $rs['BannerImage'];

		$filename = $rs['BannerImage'];
	}
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "<script type='text/javascript'>alert('Invalid file type! Please select an image.');</script>";
	} else {
		if (move_uploaded_file($_FILES["imgBanner"]["tmp_name"], $target_file)) {
		}
		$query = "UPDATE banner SET BannerName='$BannerName', BannerImage='$filename' where BannerID='" . $_REQUEST['id'] . "'";
		$result = mysqli_query($conn, $query);
		if ($result) {
			$url = "banner_list.php";
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
					$base = "http://localhost/solestory/admin/images/banners/";
					?>
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label >Banner Name</label>

							<input value="<?php echo $rs['BannerName']; ?>" name="txtBannerName" class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Banner Image</label><img height="150" class="uploaded" src="<?php echo $base . $rs['BannerImage']; ?>">
							<div class="row">
							
							<button type="submit" name="btnChoose" class="btn btn-default">
								Change Image
							</button>
								
							</div>
							<div class="row chooseimgedit"> 
							<div class="col-md-8">	
							<?php
							if (isset($_POST['btnChoose'])) {
								echo "<input class='form-control' name='imgBanner' type='file'>";
							}
							?>
							</div>
							</div>
						</div>
						<button type="submit" name="btnEditBanner" class="btn btn-default">
							Submit
						</button>

					</form>
				</div>

			</div>
		</div>

	</body>
</html>