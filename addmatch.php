<?php
    session_start();
    include 'db.php';

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Tangkap data dari formulir
        $date = $_POST["date"];
        $location = $_POST["location"];

        $score1 = $_POST["score1"];
        $name1 = $_POST["name1"];
        // Jangan lupa mengganti 'nama_tabel' sesuai dengan nama tabel yang sesuai dalam database Anda
        $logo1 = $_FILES["logo1"]["name"];

        $score2 = $_POST["score2"];
        $name2 = $_POST["name2"];
        // Jangan lupa mengganti 'nama_tabel' sesuai dengan nama tabel yang sesuai dalam database Anda
        $logo2 = $_FILES["logo2"]["name"];

        // Upload file logo1
        $target_dir = "uploads/";
        $target_file1 = $target_dir . basename($_FILES["logo1"]["name"]);
        move_uploaded_file($_FILES["logo1"]["tmp_name"], $target_file1);

        // Upload file logo2
        $target_file2 = $target_dir . basename($_FILES["logo2"]["name"]);
        move_uploaded_file($_FILES["logo2"]["tmp_name"], $target_file2);

        // Query untuk insert data ke tabel matches
        $sql = "INSERT INTO matches (team1_score, team1_name, team1_logo, team2_score, team2_name, team2_logo, match_date, location) VALUES ('$score1', '$name1', '$logo1', '$score2', '$name2', '$logo2', '$date', '$location')";

        if ($conn->query($sql) === TRUE) {
            echo "Pertandingan berhasil ditambahkan.";
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
        <form action="" method="post">
        <div class="tim">
            <div class="kiri">
                <label for="score">Score :</label>
                <input type="text" id="score" name="score">
                <p class="font-weight: normal;">Team</p>
                <label for="name" class="label">Name</label>
                <input type="text" id="name" name="score">
                <label for="logo" class="label">Logo</label>
                <input type="file" id="logo" name="logo">
            </div>
            <div class="kanan">
                <label for="score">Score :</label>
                <input type="text" id="score" name="score">
                <p>Team</p>
                <label for="name" class="label">Name</label>
                <input type="text" id="name" name="score">
                <label for="logo" class="label">Logo</label>
                <input type="file" id="logo" name="logo">
            </div>
        </div>
        <button type="submit" name="submit">Save</button>
        </form>
    </div>
</body>
</html>