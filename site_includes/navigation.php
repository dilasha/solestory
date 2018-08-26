<div class="topNav">
	<?php
	$base = "http://localhost/solestory/";
	if (isset($_SESSION['user'])) {
		//echo "<span class='session-greeting'>Hello " . $_SESSION['user'] . "!</span>";

		echo "<span class='session-greeting'><em><a href='#'><i class='glyphicon glyphicon-shopping-cart'></i> My Cart</a></em></span>";
		echo "<em><a href='http://localhost/solestory/customer/profile.php'><i class='glyphicon glyphicon-user'></i> My Profile</a></em>";
		echo "<em><a  href='" . $base . "logout.php'>Logout</a></em>";
	} else {
		echo "<em><a  href='" . $base . "login.php''>Login</a>|<em>";

		echo "<em><a  href='" . $base . "customer/signup.php''>Join us</a><em>";

	}
?>
