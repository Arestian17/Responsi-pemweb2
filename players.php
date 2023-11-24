<?php
include 'db.php';

if (isset($_GET['team_id'])) {
    $team_id = $_GET['team_id'];
    $query = "SELECT * FROM players WHERE team_id = $team_id";
    $result = $conn->query($query);
    $team_name = $conn->query("SELECT name FROM teams WHERE id = $team_id")->fetch_assoc()['name'];
} else {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/player.css">
    <link rel="icon" href="image/voli.ico">
    <title>Player</title>
</head>
<body>
    <div class="nav">
        <div class="back">
            <a href="index.php"><img src="image/panah 1.png" alt="back" class="panah"></a>
        </div>
        <img src="image/club1.png" alt="logo club" class="logo-club">
    </div>
    <div class="container">
        <div class="nickname">
            <p class="nomor">17</p>
            <p class="nama">Malson Holgate</p>
        </div>
        <div class="photo">
            <img src="image/atlet tim 1.png" alt="photo">
        </div>
        <div class="profile">
            <div class="kiri">
                <div class="name">
                    <p>Malson Holgate</p>
                    <p>17</p>
                </div>
                <hr>
                <p class="negara">
                    <img src="image/bendera jepang 11.png" alt="bendera">
                    <span>Japan</span>
                </p>
                <hr>
                <p>20 Years Old</p>
                <hr>
            </div>
            <div class="kanan">
                <p>Height : 192 cm</p>
                <hr>
                <p>Weight : 60 kg</p>
                <hr>
            </div>
        </div>
    </div>
</body>
</html>
