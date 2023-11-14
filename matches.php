<?php
include 'db.php';

$query = "SELECT m.*, t1.name AS team1_name, t2.name AS team2_name FROM matches m
          INNER JOIN teams t1 ON m.team1_id = t1.id
          INNER JOIN teams t2 ON m.team2_id = t2.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pertandingan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Pertandingan</h1>

    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><?= $row['team1_name'] ?> vs <?= $row['team2_name'] ?> - Skor: <?= $row['score_team1'] ?> - <?= $row['score_team2'] ?>, Tanggal: <?= $row['match_date'] ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
