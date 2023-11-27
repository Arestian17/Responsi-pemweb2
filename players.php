<?php
include 'db.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

$id_tim = $_GET["id"];
$result = mysqli_query($conn,"SELECT * FROM players WHERE team_id = '$id_tim'");

$result2 = mysqli_query($conn,"SELECT * FROM teams WHERE id = '$id_tim'");
$row2 = mysqli_fetch_array($result2);

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
            <a href="tim.php"><img src="image/panah 1.png" alt="back" class="panah"></a>
        </div>
        <img src="<?php echo $row2['logo']?>" alt="logo club" class="logo-club">
    </div>
    
    <div class="container">
    <?php
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="nickname">';
        echo '<p class="nomor">' . $row["number"] . '</p>';
        echo '<p class="nama">' . $row["name"] . '</p>';
        echo '</div>';
        echo '<div class="photo">';
        echo '<img src="' . $row['photo'] . '" alt="photo">';
        echo '</div>';
        echo '<div class="profile">';
        echo '<div class="kiri">';
        echo '<div class="name">';
        echo '<p>' . $row['name'] . '</p>';
        echo '<p>'.$row['number'].'</p>';
        echo '</div>';
        echo '<hr>';
        echo '<p class="negara">';
        echo '<span>' . $row['nation'] . '</span>';
        echo '</p>';
        echo '<hr>';
        echo '<p>Age : ' . $row['age'] . '</p>';
        echo '<hr>';
        echo '</div>';
        echo '<div class="kanan">';
        echo '<p>Height : ' . $row['height'] . ' cm</p>';
        echo '<hr>';
        echo '<p>Weight : ' . $row['weight'] . ' kg</p>';
        echo '<hr>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    </div>

</body>
</html>
