<!-- routes/logout.php -->

<?php
	session_start();

	// Unset all values stored in $_SESSION for (so far) logged in user
	foreach ($_SESSION as $key => $value){
		if($key != "welcome_user")
			unset($_SESSION["$key"]);
	}

	// Redirect
	header('Location: ../info/index.php');
	exit();
?>