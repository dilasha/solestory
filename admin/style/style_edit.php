<?php
session_start();
include '../../connection.php';

$query = "SELECT * FROM style WHERE StyleID='" . $_REQUEST['id'] . "'";
$result = mysqli_query($conn, $query);
$rs = mysqli_fetch_array($result);
if (isset($_POST['btnEditStyle'])) {

	$StyleName = $_POST['txtStyleName'];
	$StyleDesc = $_POST['taStyleDesc'];

	$query = "UPDATE style SET StyleName='$StyleName', StyleDesc='$StyleDesc' where StyleID='" . $_REQUEST['id'] . "'";
	$result = mysqli_query($conn, $query);
	if ($result) {
		$url = "style_list.php";
		echo "<script>window.location='" . $url . "';</script>";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}
?>

<html>
	<head>
		<title> SoleStory </title>
		<?php
		include '../admin_includes/admin_head.php';
		?>
	</head>

	<body>
		<?php
		include '../admin_includes/topnav.php';
		?>

		<div id="container">

			<div class="col-md-2 sidenav">
				<?php
				include '../admin_includes/sidenav.php';
				?>
			</div>
			<div class="col-md-10">
				<form method="POST">
					<label >Style Name</label>
					<input value="<?php echo $rs['StyleName']; ?>" name="txtStyleName" class="form-control" type="text">

					<div class="form-group">
						<label>Style Description</label>
						<textarea name="taStyleDesc" class="form-control"><?php echo $rs['StyleDesc']; ?></textarea>
					</div>
					<button type="submit" name="btnEditStyle" class="btn btn-default">
						Submit
					</button>

				</form>
			</div>
		</div>

	</body>

</html>