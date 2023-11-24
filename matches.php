<?php
include 'db.php';

$query = "SELECT m.*, t1.name AS team1_name, t2.name AS team2_name FROM matches m
          INNER JOIN teams t1 ON m.team1_id = t1.id
          INNER JOIN teams t2 ON m.team2_id = t2.id";
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
            <a href="index.php"><button><img src="image/panah 1.png" alt="back" class="panah"></button></a>
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
                <a href="add.php"><button type="submit" class="add"><img src="image/add 1.png" alt=""> Add</button></a>
            </form>
        </div>
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
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Society</td>
                    <td>0:0</td>
                    <td>Estro</td>
                    <td>20.00</td>
                    <td>GBK</td>
                    <td class="preview">Open now</td>
                    <td>
                        <a href="edit">
                            <button>Edit</button>
                        </a>
                        <a href="delete">
                            <button>Delete</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Society</td>
                    <td>0:0</td>
                    <td>Estro</td>
                    <td>20.00</td>
                    <td>GBK</td>
                    <td class="preview">Open now</td>
                </tr>
                <tr>
                    <td>3 </td>
                    <td>Society</td>
                    <td>0:0</td>
                    <td>Estro</td>
                    <td>20.00</td>
                    <td>GBK</td>
                    <td class="preview">Open now</td>
                </tr>
                
            </table>
        </div>
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
