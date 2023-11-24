<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

include 'db.php';

$query = "SELECT * FROM teams";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="image/voli.ico">
    <title>Voli</title>
</head>
<body>
    <div class="bagian1">
        <nav>
            <ul>
                <li><img src="image/voli.png" alt="logo"></li>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="tiket.php">Contact</a></li>
                <li><a href="login.php">Sign in</a></li>
            </ul>
        </nav>
        <div class="hero">
            <hr>
            <div class="text">
                <h1>VOLLY</h1>
                <h3>Match volleyball club</h3>
                <a href="#read" class="btn"><button>Read more</button></a>
            </div>
            <div class="hero-image">
                <img src="image/hero.png" alt="hero">
            </div>
        </div>
    </div>
    <div class="bagian2" id="read">
        <div class="kiri">
            <img src="image/match1.png" alt="Player volleyball">
        </div>
        <div class="tengah">
            <h1>Upcoming Match</h1>
            <div class="match">
                <div class="tim1">
                    <img src="image/club1.png" alt="club1">
                    <p>Society</p>
                </div>
                <div class="vs">
                    <p>vs</p>
                    <a href="matches.php"><button>Read more</button></a>
                </div>
                <div class="tim2">
                    <img src="image/club2.png" alt="club2">
                    <p>Estro</p>
                </div>
            </div>
        </div>
        <div class="kanan">
            <img src="image/match1.png" alt="Player volleyball" style="transform: rotateY(180deg);">
        </div>
    </div>
    <div class="bagian3">
        <h1>Featured videos</h1>
        <div class="video">
            <div class="video1">
                <iframe width="324" height="164" src="https://www.youtube.com/embed/DS4iVV8_cp4?si=P3bXDycUNaD9Ag0L" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h2>JPN VS BRA - Full Match <br> Men's VNL 2022</h2>
                <a href="https://www.youtube.com/embed/DS4iVV8_cp4?si=P3bXDycUNaD9Ag0L" target="_blank"><img src="image/play videos 1.png" alt="play"></a>
            </div>
            <div class="video2">
                <iframe width="250" height="177" src="https://www.youtube.com/embed/BxzZjhqF_HQ?si=tqtsh_ywSnrkYl4k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h2>FINAL!! INDONESIA VS FILIPINA SEA GAMES 2019</h2>
                <a href="https://www.youtube.com/embed/BxzZjhqF_HQ?si=tqtsh_ywSnrkYl4k" target="_blank"><img src="image/play videos 1.png" alt="play"></a>
            </div>
            <div class="video3">
                <p>Trending</p>
                <h2>High jump over <br>the net</h2>
                <a href="https://www.youtube.com/embed/DS4iVV8_cp4?si=P3bXDycUNaD9Ag0L" target="_blank"><img src="image/play videos 1.png" alt="play"></a>
                <img src="image/lompatan tinggi 1.png" alt="gambar lompatan" class="left-video">
            </div>
    </div>
    <div class="bagian4">
        <div class="gambar">
            <img src="image/keterangan1 1.png" alt="about image" class="image1">
            <img src="image/keterangan2 1.png" alt="about image" class="image2">
        </div>
        <div class="about" id="about">
            <h1>About us</h1>
            <p>Volleyball, initially named "mintonette," was invented in 1895 by William G. Morgan, a YMCA physical education director in Holyoke, Massachusetts, USA. Seeking a less strenuous alternative to basketball, Morgan created volleyball, combining elements of basketball, tennis, and handball.</p>
            <br>
            <p>The game quickly gained popularity worldwide due to its simplicity and the ability to be played indoors or on the beach. The rules evolved, and in 1947, the Fédération Internationale de Volleyball (FIVB) was founded, standardizing the game globally.</p>
            <br>
            <p>The sport's international appeal soared, leading to its inclusion in the Olympic Games in 1964. Since then, volleyball has seen continuous growth, with various championships, leagues, and tournaments held worldwide, showcasing the skill, athleticism, and strategic play inherent in this dynamic sport.</p>
        </div>
    </div>
</body>
</html>