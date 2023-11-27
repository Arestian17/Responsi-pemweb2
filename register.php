<?php
session_start();

include 'db.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $submit = $_POST['submit'];

    if($password != $confirm_password){
        echo "<script>alert('Sandi tidak sama');</script>";
    }else {
        $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username','$hashed_password')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>alert('Berhasil mendaftar!');
            window.location.href='login.php';</script>";
        }else{
            echo "<script>alert('Gagal mendaftar!');
            window.location.href='register.php';</script>";
        }
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
    <title>Register</title>
</head>
<body style="background-color: rgba(0,0,0,0.92);">
    <div class="container">
        <h1>Sign up</h1>
        <form action="" method="POST">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <button type="submit" style="margin-top: 12px;" name="submit">Sign up</button>
            <p>Already have an account? <a href="login.php">Sign in</a></p>
        </form>
    </div>
</body>
</html>
