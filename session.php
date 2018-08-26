<?phpsession_start();
if (!isset($_SESSION['user'])) {
	header('location:http://localhost/solestory/login.php');
}
?>


