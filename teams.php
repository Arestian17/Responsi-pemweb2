<?php
include 'db.php';

$query = "SELECT * FROM teams";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/match-tim.css">
    <link rel="icon" href="image/voli.ico">
    <title>Match tim</title>
</head>
<body>
    <div class="bagian1">
        <div class="back">
            <a href=""><button><img src="image/panah 1.png" alt=""></button></a>
        </div>
        <div class="content">
            <img src="image/atlet tim 1.png" alt="atlet tim1" class="atlet1">
            <div class="tim1">
                <img src="image/club1.png" alt="tim1">
                <h1>Society</h1>
            </div>
            <div class="vs">
                <span class="date">30 November 2023</span><br>
                <span class="time">00 : 10 : 20</span><br>
                <p class="score">6 vs 5</p>
            </div>
            <div class="tim2">
                <img src="image/club2.png" alt="tim2">
                <h1>Estro</h1>
            </div>
            <img src="image/atlet tim 2.png" alt="atlet tim2" class="atlet2">
        </div>
    </div>
    <div class="bagian2">
        <div class="col-left">
            <div class="tim">
                <img src="image/club1.png" alt="tim1">
                <h3>Society</h3>
                <span>Player</span>
            </div>
            <div class="player">
                <div class="player1">
                    <img src="image/atlet tim 1.png" alt="player1">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    
                    <button type="submit">go</button>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 1.png" alt="player2">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 1.png" alt="player3">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 1.png" alt="player4">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 1.png" alt="player5">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-right">
            <div class="tim">
                <img src="image/club1.png" alt="tim1">
                <h3>Society</h3>
                <span>Player</span>
            </div>
            <div class="player">
                <div class="player1">
                    <img src="image/atlet tim 2.png" alt="player1">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 2.png" alt="player2">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 2.png" alt="player3">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 2.png" alt="player4">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
                <div class="player1">
                    <img src="image/atlet tim 2.png" alt="player5">
                    <div class="profile">
                        <h4>John Doe</h4>
                        <div class="negara">
                            <img src="image/bendera jepang 1.png" alt="">
                            <span>Japan</span>
                        </div>
                    </div>
                    <div class="go">
                    <button>go</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>