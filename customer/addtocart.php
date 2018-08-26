<?php
session_start();
include '../connection.php';
include '../user_check.php';
$custID = $_SESSION['custID'];
echo $custID;
if (isset($_POST['btnAddCart'])) {

	$prodID = mysql_escape_string($_POST['cartProdID']);
	$query = "SELECT * FROM product where ProductID='$prodID'";
	$result = mysqli_query($conn, $query);
	if ($result) {

		$quantity = mysql_escape_string($_POST['cartQuantity']);

		$addtocart = "INSERT INTO cart SET ProductID='$prodID', CustomerID='$custID', Quantity='$quantity'";
		$resultAdd = mysqli_query($conn, $addtocart);
		if ($resultAdd) {
			echo "<script>alert(' done')</script>";

			$url = "http://localhost/solestory/customer/cart.php";
			echo "<script>window.location='" . $url . "';</script>";

		} else {

			echo "<script>alert(' NOpe')</script>";

			echo "Error" . mysqli_error($conn);
		}

	} else {
		echo "<script>alert(' NO')</script>";

		$url = "http://localhost/solestory/";
		echo "<script>window.location='" . $url . "';</script>";
	}
}
?>