<?php
session_start();

include '../connection.php';


$userID = $_REQUEST['id'];

$query = "Select * from user where UserID='$userID'";
$result = mysqli_query($conn, $query);
$rowCount = 1;
while ($rs = mysqli_fetch_assoc($result)) {
	$fullname = $rs['FullName'];
	$username = $rs['UserName'];
	$email = $rs['Email'];
	$password = $rs['Password'];
}
if (isset($_POST['btnEditUser'])) {

	$fullName = $_POST['txtFullName'];
	$username = $_POST['txtUsername'];
	$email = $_POST['txtEmail'];
	$password = $_POST['txtPassword'];

	if ($password != $_POST['txtConfirmPassword']) {
		echo "<script>alert('Password mismatch! Please enter again')</script>";
	} else {
		$sql = "Update user Set FullName='$fullName', UserName='$username', Email='$email', 
    			Password='$password' Where UserID=$userID";

		if (mysqli_query($conn, $sql)) {

			$url = "http://localhost/solestory/customer/profile.php";
			echo "<script>window.location='" . $url . "';</script>";

		} else {
			echo "Update Failed";
		}
	}
}
?>
<html>
	<head>
		<title> Sole Story </title>

		<?php
		include '../site_includes/head.php';
		?>
		<script language="javascript">
			function ConfirmDelete() {
				return confirm("Do you want to permanently delete this style?");
			}
		</script>
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
								<form method="post">
									<div class='row'>

										<div class="col-md-8">
											<h2>Profile</h2>
										</div>

										<div class='col-md-8'>
											<label>Full Name </label>
											<div class='form-group'>
												<input class="form-control" type="text" name="txtUsername" value="<?php echo $fullname; ?>">
											</div>
										</div>

										<div class='col-md-8'>
											<label>Username </label>

											<div class='form-group'>
												<input class="form-control" type="text" name="txtUsername" value="<?php echo $username; ?>">
											</div>
										</div>

										<div class='col-md-8'>
											<label>Email </label>
											<div class='form-group'>

												<input class="form-control" type="text" name="txtEmail" value="<?php echo $email; ?>">
											</div>
										</div>

										<div class='col-md-8'>
											<label>Password </label>
											<div class='form-group'>
												<input class="form-control" type="password" name="txtPassword" value="<?php echo $password; ?>">

											</div>
										</div>
										<div class='col-md-8'>
											<label>Confirm Password </label>
											<div class='form-group'>
												<input class="form-control" type="password" name="txtConfirmPassword" value="<?php echo $password; ?>">

											</div>
										</div>

									</div>
									<div class="col-md-8">
										<a href='delete_account.php?id=$idValue' onclick='return ConfirmDelete()'>
										<button class="btn">
											Delete Account Permanently
										</button></a>
										<a href='profile.php'>
										<button class="btn">
											Cancel
										</button></a>

										<input class="btn btn-primary" name="btnEditUser" type="submit" value="Save">

									</div>
								</form>

								<div class="col-md-2">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>