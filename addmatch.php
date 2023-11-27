<?php
    session_start();
    include 'db.php';

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
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