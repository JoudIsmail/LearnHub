<?php

	session_start();
	session_destroy();
	header("Location: /nachricht.php?type=abgemeldet");


?>
