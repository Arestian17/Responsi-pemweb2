<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

include 'db.php';

$query = "SELECT * FROM teams";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tim Voli</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Selamat datang, <?= $_SESSION['username'] ?>!</h1>

    <h2>Daftar Tim Voli</h2>

    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><?= $row['name'] ?> - Pelatih: <?= $row['coach'] ?> - <a href="players.php?team_id=<?= $row['id'] ?>">Lihat Pemain</a></li>
        <?php endwhile; ?>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>
