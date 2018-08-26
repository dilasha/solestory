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
			<div class="row">
				<div class="col-md-2 sidenav">
					<?php
					include '../admin_includes/sidenav.php';
					?>
				</div>
				<div class="col-md-10">

					<?php
					include '../admin_includes/topnav.php';
					?>

					<form method="post">
						<div class="form-group">
							<label >Style Name</label>
							<input placeholder="Enter style name." name="txtStyleName" class="form-control" type="text">
						</div>
						<div class="form-group">
							<label>Style Description</label>
							<textarea name="taStyleDesc" placeholder="Your description here." class="form-control"></textarea>
						</div>
						<button type="submit" name="btnAddStyle" class="btn btn-default">
							Submit
						</button>
					</form>
				</div>

			</div>
		</div>

	</body>
</html>
<?php
if (isset($_POST['btnAddStyle'])) {

	$styleName = $_POST['txtStyleName'];
	$styleDesc = $_POST['taStyleDesc'];

	$query = "INSERT INTO style(StyleID, StyleName, StyleDesc) VALUES('','$styleName','$styleDesc')";

	if (mysqli_query($conn, $query)) {
		$url = "style_list.php";
		echo "<script>window.location='" . $url . "';</script>";
	} else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
?>