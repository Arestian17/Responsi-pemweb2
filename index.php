<?php
session_start();

include 'db.php';

if(isset($_POST['submit'])){
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $link3 = $_POST['link3'];
    $insertQuery = "INSERT INTO video (link) VALUES ('$link1'),('$link2'),('$link3')";
    $result = $conn->query($insertQuery);
}

$video1 = $conn->query("SELECT * FROM video ORDER BY id DESC LIMIT 1")->fetch_assoc();
$video2 = $conn->query("SELECT * FROM video ORDER BY id DESC LIMIT 1 OFFSET 1")->fetch_assoc();
$video3 = $conn->query("SELECT * FROM video ORDER BY id DESC LIMIT 1 OFFSET 2")->fetch_assoc();

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
                <?php if(isset($_SESSION["login"])){
                    echo '<li><a href="matches.php">Matches</a></li>';
                    echo '<li><a href="teams.php">Teams</a></li>';
                    echo '<li><a href="logout.php">Log out</a></li>';
                }else if(!isset($_SESSION["login"])){
                    echo '<li><a href="#about">About</a></li>';
                    echo '<li><a href="#contact">Contact</a></li>';
                    echo '<li><a href="login.php">Login</a></li>';
                } ?>
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
            <form action="" method="post">
            <div class="video1">
                <iframe width="300" height="164" src="<?php echo htmlspecialchars($video1['link']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h2>Trending Videos This Week!</h2>
                <a href="<?php echo htmlspecialchars($video1['link']); ?>" target="_blank"><img src="image/play videos 1.png" alt="play"></a>
                <?php if(isset($_SESSION["admin"])) : ?>
                    <label for="link1">Video 1 URL:</label>
                    <input type="text" id="link1" name="link1" value="<?php echo htmlspecialchars($video1['link']); ?>">
                <?php endif ?>
            </div>
            <div class="video2">
                <iframe width="300" height="164" src="<?php echo htmlspecialchars($video2['link']);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h2>Latest Viral Volleyball Video!</h2>
                <a href="<?php echo htmlspecialchars($video2['link']);?>" target="_blank"><img src="image/play videos 1.png" alt="play"></a>
                <?php if(isset($_SESSION["admin"])) : ?>
                    <label for="link2">Video 2 URL:</label>
                    <input type="text" id="link2" name="link2" value="<?php echo htmlspecialchars($video2['link']);?>">
                <?php endif ?>
            </div>
            <div class="video3">
                <iframe width="300" height="164" src="<?php echo htmlspecialchars($video3['link']);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <h2>Current Top Videos!</h2>
                <a href="<?php echo htmlspecialchars($video3['link']); ?>" target="_blank"><img src="image/play videos 1.png" alt="play"></a>
                <?php if(isset($_SESSION["admin"])) : ?>
                    <label for="link3">Video 3 URL:</label>
                    <input type="text" id="link3" name="link3" value="<?php echo htmlspecialchars($video3['link']);?>">
                <?php endif ?>
            </div>
        </div>
        <?php if(isset($_SESSION["admin"])) : ?>
            <button type="submit" name="submit">Submit</button>
        <?php endif ?>
        </form>
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
    <footer>
        <div class="logo">
            <img src="image/voli.png" alt="logo">
            <span>Volleyball</span>
        </div>
        <div class="footer">
            <div class="social" id="contact">
                <a href="https://www.facebook.com/"><img src="image/facebook.png" alt="facebook"></a>
                <a href="https://www.youtube.com/"><img src="image/youtube.png" alt="twitter"></a>
                <a href="https://www.instagram.com/"><img src="image/instagram.png" alt="instagram"></a>
            </div>
            <div class="kalimat">
                <p style="margin: auto; text-align: center;   margin-top: 40px;" class="atas">Terms of us - Privacy.</p>
                <p style="margin: auto; text-align: center;" class="bawah">© 2023</p>
            </div>
        </div>
    </footer>
</body>
</html>