<?php 
include 'db.php';
session_start();
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
    <title>Add Player</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&family=Poppins&display=swap");
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(0, 0, 0, 0.9);
            background-image: url("image/bglogin.png");
        }

        nav {
            background-color: #fff;
            width: 100%;
            height: 60px;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        nav img {
            width: 30px;
            height: 30px;
            object-fit: contain;
            margin-left: 20px;
        }

        .container {
            max-width: 70%;
            margin: 90px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 42px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            color: #000;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            text-transform: capitalize;
        }

        input[type="number"],
        input[type="text"],
        input[type="file"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php"><img src="image/panah 1.png" alt="back"></a>
    </nav>
    <div class="container">
        <h1>Add new Player</h1>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" id="name">
            <label for="number">Number</label>
            <input type="number" id="number">
            <label for="nation">Nation</label>
            <input type="text" id="nation">
            <label for="age">Age</label>
            <input type="number" id="number">
            <label for="height">Height</label>
            <input type="number" id="height">
            <label for="weight">weight</label>
            <input type="number" id="weight">
            <label for="foto">Photo</label>
            <input type="file" id="foto">
        </form>
    </div>
</body>
</html>