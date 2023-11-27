<?php
include 'db.php';

session_start();
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' ";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (isset($row['password'])) {
            $dbpassword = $row['password'];
            if (password_verify($password, $dbpassword)) {
                $_SESSION["login"] = true;
                $_SESSION['username'] = $username;
                $role = $row["role"];
                if($role == "admin"){
                    $_SESSION["admin"] = true;
                }
                header("location: index.php");
                exit();
            } else {
                echo "<script>
                alert('Username atau password salah.');
                window.location.href = 'login.php';
              </script>";
            }
        } else {
            echo "<script>
                alert('Error: Field password tidak ditemukan dalam database.');
                window.location.href = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Username atau password salah.');
            window.location.href = 'login.php';
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="image/voli.ico">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Sign In</h1>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <button type="submit" name="submit">Sign in</button>
        </form>    
        <p>Didn't have an account? <a href="register.php">Sign up</a></p>
    </div>
</body>
</html>
