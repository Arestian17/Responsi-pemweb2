<?php
include 'db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' ";
    $result = $conn->query($query);
    $row=mysqli_fetch_assoc($result);
    $dbpassword=$row['password'];
    if (password_verify($password, $dbpassword)){
        $_SESSION['username'] = $username;
        header("location: index.php");
    }else{
        $error = "Username atau password salah.";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>
</body>
</html>
