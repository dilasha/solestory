<div class="topNav">
	<?php
	$base = "http://localhost/solestory/";
	if (isset($_SESSION['user'])) {
		echo "Welcome " . $_SESSION['user']."!";
		echo "<a  href='" . $base . "logout.php'><button class='btn'>Logout</button></a>";
	}
	?>
</div>
