<?php
session_start();
include "connection.php";

if (isset($_SESSION['user'])) {
	$uName = $_SESSION['user'];
	$query = "SELECT * FROM user WHERE UserName='$uName'";
	$result = mysqli_query($conn, $query);

	if ($row = mysqli_fetch_assoc($result)) {
		$_SESSION['isAdmin'] = $row['IsAdmin'];

		if ($_SESSION['isAdmin'] == 1) {

			$url = "http://localhost/solestory/admin/dashboard/";
			echo "<script>window.location='" . $url . "';</script>";

		} else {
			$url = "http://localhost/solestory/index.php";
			echo "<script>window.location='" . $url . "';</script>";

		}
	}
}
$error_msg = '';

if (isset($_POST['btnLogin']) && $_POST['btnLogin'] == 'Login') {
	$uName = $_POST['txtUsername'];
	$pass = $_POST['txtPassword'];

	echo "<script>alert('" . $_SESSION['user'] . "'</script>)";

	$query = "SELECT * FROM User WHERE UserName='$uName' AND Password='$pass'";
	if (isset($_POST['chkAdmin'])) {
		$query .= "AND IsAdmin=1;";
		$url = "admin/dashboard";
	} else {
		$url = "index.php";
	}

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);
	echo $row;
	if ($row) {
		$_SESSION['user'] = $uName;

		echo "<script>window.location='" . $url . "';</script>";
	} else {
		$error_msg = "<div class='errormsg'>Login Failed! Please try again.</div>";
	}
}
?>

<html>
	<head>
		<title> Sole Story </title>

		<?php
		include 'site_includes/head.php';
		?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<?php
					include 'site_includes/header.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="row">

						<?php
						include 'site_includes/navigation.php';
						?>
						<div class="row">
							<div class="col-md-10">
								<form name="f1" method="POST">

									<div class="col-md-8">
										<div class="form-group">
											<input required placeholder="Username" name="txtUsername" class="form-control" type="text">
										</div>
									</div>

									<div class="col-md-8">
										<div class="form-group">
											<input required placeholder="Password" name="txtPassword" class="form-control" type="password">
										</div>
									</div>
									<div class="col-md-8">

										<div  class="checkbox" >
											<label>
												<input type="checkbox" name="chkAdmin">
												Are you an Admin?</label>
										</div>

									</div>
									<div class="col-md-8">

										<?php echo $error_msg; ?>
									</div>

									<div class="col-md-8">

										<input class="btn btn-primary" name="btnLogin" type="submit" value="Login">

									</div>

								</form>
							</div>
							<div class="col-md-2">

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>

