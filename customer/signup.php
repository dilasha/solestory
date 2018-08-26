<?php
session_start();

include "../connection.php";
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
						<div class="row">
							<div class="col-md-10">
								<form name="f1" method="POST">

									<div class="col-md-8">
										<div class="form-group">
											<label>Full Name</label>

											<input class="form-control" type="text" name="txtFullName">

										</div>
									</div>

									<div class="col-md-5">
										<div class="form-group">
											<label>Email</label>

											<input class="form-control" type="text" name="txtEmail">

										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Username</label>

											<input class="form-control" type="text" name="txtUsername">

										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label>Password</label>
											<input class="form-control" type="password" name="txtPassword">

										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label>Confirm Password</label>

											<input class="form-control" type="password" name="txtConfirmPassword">

										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">

											<input class="btn btn-primary" name="btnAddUser" type="submit" value="Save">

										</div>

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
<?php

if (isset($_POST['btnAddUser'])) {

	$fullName = $_POST['txtFullName'];
	$username = $_POST['txtUsername'];
	$email = $_POST['txtEmail'];
	$password = $_POST['txtPassword'];
	$active = 0;

	$sql = "INSERT INTO User(FullName, UserName, Email, Password)
VALUES ('$fullName', '$username', '$email', '$password')";

	if (mysqli_query($conn, $sql)) {
		$url = "http://localhost/solestory/site/profile.php";
		echo "<script>window.location='" . $url . "';</script>";
	} else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>