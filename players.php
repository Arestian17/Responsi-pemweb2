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
    <title>Pemain</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Pemain Tim <?= $team_name ?></h1>

    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><?= $row['name'] ?> - Posisi: <?= $row['position'] ?></li>
        <?php endwhile; ?>
    </ul>

    <a href="index.php">Kembali ke Daftar Tim</a>
</body>
</html>
