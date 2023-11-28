<?php
include 'db.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$teamQuery = "SELECT id, name FROM teams";
$teamResult = $conn->query($teamQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $name = $_POST["name"];
    $number = $_POST["number"];
    $nation = $_POST["nation"];
    $age = $_POST["age"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $tim = $_POST["tim"];

    // Upload file foto
    $target_dir = "image/";
    $foto = $_FILES["foto"]["name"];
    $foto_path = $target_dir . basename($foto);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_path);

    // Query untuk insert data ke tabel players
    $sql = "INSERT INTO players (name, team_id, number, nation, age, height, weight, photo) 
            VALUES ('$name', '$tim', '$number', '$nation', '$age', '$height', '$weight', '$foto_path')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pemain berhasil ditambahkan.');</script>";
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
        input[type="file"],
        select {
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
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <label for="tim">Tim</label>
            <select name="tim" id="tim">
                <?php
                    // Loop through the team results and generate options
                    while ($teamRow = $teamResult->fetch_assoc()) {
                        echo "<option value='{$teamRow['id']}'>{$teamRow['name']}</option>";
                    }
                ?>
            </select>
            <label for="number">Number</label>
            <input type="number" id="number" name="number">
            <label for="nation">Nation</label>
            <input type="text" id="nation" name="nation">
            <label for="age">Age</label>
            <input type="number" id="number" name="age">
            <label for="height">Height</label>
            <input type="number" id="height" name="height">
            <label for="weight">weight</label>
            <input type="number" id="weight" name="weight">
            <label for="foto">Photo</label>
            <input type="file" id="foto" name="foto">
            <button type="submit" name="submit">Add</button>
        </form>
    </div>
</body>
</html>