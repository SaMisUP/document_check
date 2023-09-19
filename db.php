<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ministere_sante";
	// Create connection
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	?>