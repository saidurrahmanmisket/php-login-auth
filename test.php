<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<form action="login.php" method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<?php if (isset($_GET['error'])) { echo "<p style='color: red;'>Please fill in both fields.</p>"; } ?>
		<input type="submit" value="Login">
	</form>
</body>
</html>
