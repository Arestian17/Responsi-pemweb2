<?php
include 'db.php';

$query = "SELECT * FROM teams";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tim Voli</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar Tim Voli</h1>

    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><?= $row['name'] ?> - Pelatih: <?= $row['coach'] ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html