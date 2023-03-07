<?php

$uname = $_POST["uname"];
if (empty($_POST["uname"])) {
	die("Bruh you need a name");
}

$pword = $_POST["pword"];
if (strlen($_POST["pword"]) < 8) {
	die("Password must be at least 8 characters");
}

$host = "localhost";
$dbname = "user_database";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO tempuserdatabase (uname, pword)
	VALUE (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss",
				$uname,
				$pword);

mysqli_stmt_execute($stmt);

echo "Sign-up Successful.";
?>