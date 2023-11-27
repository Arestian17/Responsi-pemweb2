<?php
    session_start();
    include('db.php');

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addtim.css">
    <link rel="icon" href="image/voli.ico">
    <title>Add Player</title>
</head>
<body>
    <nav>
        <a href="index.php"><img src="image/panah 1.png" alt="back"></a>
    </nav>
    <div class="container">
        <h1>Add New Tim</h1>
        <form action="" method="post">
            <label for="name">Name</label>
            <input type="text" id="name">
            <label for="foto">Logo</label>
            <input type="file" id="foto">
        </form>
    </div>
</body>
</html>