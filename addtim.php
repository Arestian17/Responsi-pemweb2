<?php
include 'db.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $teamName = $_POST["teamName"];
    $teamLogo = $_FILES["teamLogo"]["name"];

    // Jangan lupa mengganti 'nama_tabel' sesuai dengan nama tabel yang sesuai dalam database Anda
    $teamLogoTargetDir = "uploads/team_logos/";
    $teamLogoTargetFile = $teamLogoTargetDir . basename($_FILES["teamLogo"]["name"]);
    move_uploaded_file($_FILES["teamLogo"]["tmp_name"], $teamLogoTargetFile);

    // Query untuk insert data ke tabel teams
    $sql = "INSERT INTO teams (name, logo) VALUES ('$teamName', '$teamLogo')";

    if ($conn->query($sql) === TRUE) {
        echo "Tim berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Add Player</title>
</head>
<body>
    <nav>
        <a href="index.php"><img src="image/panah 1.png" alt="back"></a>
    </nav>
    <div class="container">
        <h1>Add New Tim</h1>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" id="name">
            <label for="foto">Logo</label>
            <input type="file" id="foto">
        </form>
    </div>
</body>
</html>