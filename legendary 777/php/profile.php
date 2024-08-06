<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'legendary777');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
	<h1>Profile</h1>
	<form method="post">
		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password" required>
		<button type="submit">Update</button>
	</form>
</body>
</html>
    