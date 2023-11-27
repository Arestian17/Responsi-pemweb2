<?php
include 'db.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}

$query = "SELECT * FROM matches ORDER BY id ASC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/match.css">
    <link rel="icon" href="image/voli.ico">
    <title>Match</title>
</head>

<body>
    <div class="nav">
        <div class="back">
            <a href="index.php">
                <button><img src="image/panah 1.png" alt="back" class="panah"></button>
            </a>
        </div>
        <div class="search">
            <input type="text" id="searchInput" placeholder="Search...">
            <img src="image/search 1.png" alt="search" class="logo-search">
        </div>
        <div class="profile">
            <a href="profile.php"><img src="image/atlet tim 1.png" alt="profile"></a>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <p>Match list</p>
            <form action="" method="post">
                <button type="submit" class="add"><a href="addmatch.php"><img src="image/add 1.png" alt=""> Add</a></button>
            </form>
        </div>
        <?php if (!isset($_SESSION['admin'])) : ?>
            <div class="tabel">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Team</th>
                        <th>Score</th>
                        <th>Team</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Preview</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        // Fetch and display team names
                        $team1_query = "SELECT name FROM teams WHERE id = " . $row['team1_id'];
                        $team1_result = $conn->query($team1_query);
                        $team1_name = $team1_result->fetch_assoc()['name'];

                        $team2_query = "SELECT name FROM teams WHERE id = " . $row['team2_id'];
                        $team2_result = $conn->query($team2_query);
                        $team2_name = $team2_result->fetch_assoc()['name'];

                        echo '<td>' . $team1_name . '</td>';
                        echo '<td>' . $row['score_team1'] . ' : ' . $row['score_team2'] . '</td>';
                        echo '<td>' . $team2_name . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '<td class="preview">' . $row['preview'] . '</td>';
                        echo '</tr>';
                        $no++;
                    }
                    ?>
                </table>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['admin'])) : ?>
        <div class="tabel">
            <form action="" method="post">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Team</th>
                        <th>Score</th>
                        <th>Team</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Preview</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td><input type="text" name="id[]" value="' . $row['id'] . '" hidden>' . $no . '</td>';
                        $team1_query = "SELECT name FROM teams WHERE id = " . $row['team1_id'];
                        $team1_result = $conn->query($team1_query);
                        $team1_name = $team1_result->fetch_assoc()['name'];

                        $team2_query = "SELECT name FROM teams WHERE id = " . $row['team2_id'];
                        $team2_result = $conn->query($team2_query);
                        $team2_name = $team2_result->fetch_assoc()['name'];

                        echo '<td><input type="text" name="team1_name[]" value="' . $team1_name . '"></td>';
                        echo '<td><input type="text" name="score_team1[]" value="' . $row['score_team1'] . '"> : <input type="text" name="score_team2[]" value="' . $row['score_team2'] . '"></td>';
                        echo '<td><input type="text" name="team2_name[]" value="' . $team2_name . '"></td>';
                        echo '<td><input type="text" name="time[]" value="' . $row['time'] . '"></td>';
                        echo '<td><input type="text" name="location[]" value="' . $row['location'] . '"></td>';
                        echo '<td><input type="text" name="preview[]" value="' . $row['preview'] . '"></td>';
                        echo '<td><button type="submit" name="submit">Edit</button> <a href="delete.php?id=' . $row['id'] . '"><button>Delete</button></a></td>';
                        echo '</tr>';
                        $no++;
                    }
                    ?>
                </table>
            </form>
        </div>
    <?php endif; ?>
    </div>
    <script>
        var searchInput = document.getElementById("searchInput");

        // Untuk searching
        function search() {
            var searchText = searchInput.value.toLowerCase();
            var tableRows = document.querySelectorAll(".tabel table tr");
            for (var i = 0; i < tableRows.length; i++) {
                var tableRow = tableRows[i];
                var rowData = tableRow.innerText.toLowerCase();
                if (rowData.includes(searchText)) {
                    tableRow.style.display = "";
                } else {
                    tableRow.style.display = "none";
                }
            }
        }

        searchInput.addEventListener("input", search);
    </script>
</body>

</html>
