<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$mysqli = require __DIR__ . "/database.php";
	
	$sql = sprintf("SELECT * FROM tempuserdatabase
			    WHERE uname = '%s'",
			    $mysqli->real_escape_string($_POST["uname"]));

	$result = $mysqli->query($sql);
	$user = $result->fetch_assoc();

	if ($user) {
		if (password_verify($_POST["pword"], $user["pword_hash"])) {
			die("Login successful");
		}
	}

	$is_invalid = true;
}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>NewerGrounds</title>
</head>
<body style="background-color: #000000">

<?php if ($is_invalid): ?>
	<em><span style="color: #FFFFFF">Invalid login</em>
<?php endif; ?>

<form method="post">
  <br>
  <label for="uname"><span style="color: #FFFFFF">Username:</span></label><br>
  <input type="text" id="uname" name="uname" 
		value="<?= htmlspecialchars($_POST["uname"] ?? "") ?>" ><br>

  <label for="pword"><span style="color: #FFFFFF">Password:</span></label><br>
  <input type="password" id="pword" name="pword"><br>

  <button>Log in</button>
</form>
<div class="clearfix">
</div>
</body>
</html>