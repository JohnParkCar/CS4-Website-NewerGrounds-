<?php

$uname = $_POST["uname"];
if (empty($_POST["uname"])) {
	die("Bruh you need a name");
}

$pword = $_POST["pword"];
if (strlen($_POST["pword"]) < 8) {
	die("Password must be at least 8 characters");
}

if (! preg_match("/[a-z]/i", $_POST["pword"])) {
	die("Password must have at least one letter");
}

if (! preg_match("/[0-9]/", $_POST["pword"])) {
	die("Password must have at least one number");
}

$password_hash = password_hash($_POST["pword"], PASSWORD_DEFAULT);

/* Took this stuff and moved it into database.php*/

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO tempuserdatabase (uname, pword, pword_hash)
	VALUE (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
	die("SQL error: " . mysqli->error);
}

mysqli_stmt_bind_param($stmt, "sss",
				$uname,
				$pword,
				$password_hash);

mysqli_stmt_execute($stmt);

echo "Sign-up Successful.";
?>