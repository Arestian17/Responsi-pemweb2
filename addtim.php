<?php
include 'db.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}

if (isset($_POST["submit"])) {
    // Check if the file was uploaded successfully
    if (isset($_FILES["teamLogo"]) && $_FILES["teamLogo"]["error"] == 0) {
        $teamName = $_POST["teamName"];
        $teamLogo = $_FILES["teamLogo"]["name"];
        $teamLogoTmp = $_FILES["teamLogo"]["tmp_name"];
        $uploadPath = "image/" . $teamLogo;

        // Move uploaded image to the image folder
        move_uploaded_file($teamLogoTmp, $uploadPath);

        // Insert data into the database
        $query = "INSERT INTO teams (name, logo) VALUES ('$teamName', '$uploadPath')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Data added successfully.')</script>";
        } else {
            $error_message = mysqli_error($conn);
            echo "<script>alert('Error: $error_message')</script>";
        }
    } else {
        echo "<script>alert('Error uploading file.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addtim.css">
    <link rel="icon" href="image/voli.ico">
    <title>Add Tim</title>
</head>
<body>
    <nav>
        <a href="index.php"><img src="image/panah 1.png" alt="back"></a>
    </nav>
    <div class="container">
        <h1>Add New Tim</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" id="name" name="teamName">
            <label for="foto">Logo</label>
            <input type="file" id="foto" name="teamLogo">
            <button type="submit" name="submit">Save</button>
        </form>
    </div>
</body>
</html>