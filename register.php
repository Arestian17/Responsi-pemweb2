<?php
session_start();

// Include your database connection code here
// For simplicity, let's assume the connection is in a file named db.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform additional validation as needed

    // Hash the password (use a strong hashing algorithm like bcrypt)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the 'users' table
    $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    $result = $conn->query($insertQuery);

    if ($result) {
        // Redirect to login page after successful registration
        header("location: login.php");
        exit();
    } else {
        $error = "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Register</h1>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Register</button>
    </form>

    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>
