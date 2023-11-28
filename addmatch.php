<?php
    session_start();
    include 'db.php';

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    
    $teamQuery = "SELECT id, name FROM teams";
    $teamResult = $conn->query($teamQuery);
    $teamQuery2 = "SELECT id, name FROM teams";
    $teamResult2 = $conn->query($teamQuery2);

    if (isset($_POST["submit"])) {
        // Tangkap data dari formulir
        $date = $_POST["date"];
        $location = $_POST["location"];

        $score1 = $_POST["score1"];
        $name1 = $_POST["name1"];

        $score2 = $_POST["score2"];
        $name2 = $_POST["name2"];


        // Query untuk insert data ke tabel matches
        $sql = "INSERT INTO matches (team1_id, team2_id, score_team1, score_team2, time, location) VALUES ('$name1', '$name2', '$score1', '$score2', '$date', '$location')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Match Added Successfully!')</script>";
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
    <link rel="icon" href="image/voli.ico">
    <link rel="stylesheet" href="css/addmatch.css">
    <title>Add Match</title>
</head>
<body>
    <div class="nav">
        <a href="index.php"><button class="back"><img src="image/panah 1.png" alt="back" class="panah"></button></a>
    </div>
    <div class="container">
        <h1 class="header">Add New Match</h1>
        <form action="" method="post">
        <div class="row">
            <div class="time">
                <label for="date">Select A Time</label>
                <input type="time" name="date" id="date">
            </div>
            <div class="2">
                <label for="location" class="location">Location :</label>
                <input type="text" name="location" id="location">
            </div>
        </div>
        <hr>
        <div class="tim">
            <div class="kiri">
                <label for="score">Score :</label>
                <input type="text" id="score" name="score1">
                <p class="font-weight: normal;">Team</p>
                <label for="name" class="label">Name</label>
                <select id="name" name="name1">
                    <?php
                        // Loop through the team results and generate options
                        while ($teamRow = $teamResult->fetch_assoc()) {
                            echo "<option value='{$teamRow['id']}'>{$teamRow['name']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="kanan">
                <label for="score">Score :</label>
                <input type="text" id="score" name="score2">
                <p>Team</p>
                <label for="name" class="label">Name</label>
                <select id="name" name="name2">
                    <?php
                        // Loop through the team results and generate options
                        while ($teamRow2 = $teamResult2->fetch_assoc()) {
                            echo "<option value='{$teamRow2['id']}'>{$teamRow2['name']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <button type="submit" name="submit">Save</button>
        </form>
    </div>
</body>
</html>