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

								<div class='row'>

									<div class="col-md-8">
										<h2>Profile</h2>
									</div>

									<?php
									$userNameS = $_SESSION['user'];
									$query = "Select * from user where userName='$userNameS'";
									$result = mysqli_query($conn, $query);
									$rowCount = 1;
									while ($row = mysqli_fetch_assoc($result)) {
										$userID = $row['UserID'];
										echo "
									<div class='col-md-8'>
										<label>Full Name </label>
										<div class='form-group'>
											<input class='form-control' value=" . $row['FullName'] . " disabled>
										</div>
									</div>";

										echo "
									<div class='col-md-8'>
										<label>Username </label>
										<div class='form-group'>
											<input class='form-control' value=" . $row['UserName'] . " disabled>
										</div>
									</div>";

										echo "
									<div class='col-md-8'>
										<label>Email </label>
										<div class='form-group'>
											<input class='form-control' value=" . $row['Email'] . " disabled>
										</div>
									</div>";

										echo "
									<div class='col-md-8'>
										<label>Password </label>
										<div class='form-group'>
											<input class='form-control' value=" . $row['Password'] . " disabled>
										</div>
									</div>";

										echo "</div>";
									}
									?>
									<div class="col-md-8">
										<a href='profile_edit.php?id=<?php echo $userID;?>'>
										<button class='btn'>
											Edit <i class='glyphicon glyphicon-edit'></i>
										</button> </a>
									</div>
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