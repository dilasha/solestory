<?php
if (!isset($_SESSION['user'])) {
	$url = "http://localhost/solestory/login.php";
	echo "<script>window.location='" . $url . "';</script>";

} else {

	$uName = $_SESSION['user'];
	$query = "SELECT * FROM user WHERE UserName='$uName'";
	$result = mysqli_query($conn, $query);

	if ($row = mysqli_fetch_assoc($result)) {
		$_SESSION['isAdmin'] = $row['IsAdmin'];
		if ($_SESSION['isAdmin'] == 1) {

			$url = "http://localhost/solestory/login.php";
			echo "<script>window.location='" . $url . "';</script>";

		} else {

			$_SESSION['custID'] = $row['UserID'];
		}

	}
}
?>