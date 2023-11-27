<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    
    $query = "SELECT * FROM teams ORDER BY poin DESC";
    $result = $conn->query($query);

    if(isset($_POST['submit'])){
        $poin = $_POST['poin'];
        $id = $_POST['id'];
        $updateQuery = "UPDATE teams SET poin = '$poin' WHERE id = '$id'";
        $result = $conn->query($updateQuery);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/teams.css">
</head>
<body>
    <nav>
        <a href="index.php"><img src="image/panah 1.png" alt="back"></a>
    </nav>
    <div class="container">
        <h1>Leaderboard Teams</h1>
        <?php if(!isset($_SESSION['admin'])) : ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Poin</th>
                </tr>
                <?php
                $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td><img src='" . $row['logo'] . "' alt='tim'></td>";
                        echo "<td><a href='players.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>";
                        echo "<td>" . $row['poin'] . "</td>";
                        echo "</tr>";
                        $no++;
                    }
                ?>
            </table>
        <?php endif; ?>
        <?php if(isset($_SESSION['admin'])) : ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Poin</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<form action='' method='post'>";
                        echo "<tr>";
                        echo "<td><input type='text' name='id' value=".$row['id']." hidden>" . $no . "</td>";
                        echo "<td><img src='" . $row['logo'] . "' alt='tim'></td>";
                        echo "<td><a href='players.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>";
                        echo "<td><input type='number' name='poin' value=".$row['poin']."></td>";
                        echo "<td><button type='submit' name='submit'>Edit</button> <a href='delete.php?id=" . $row['id'] . "'><button>Delete</button></a></td>";
                        echo "</tr>";
                        echo "</form>";
                        $no++;
                    }
                ?>
            </table>
        <?php endif; ?>
    </div>
    
</body>
</html>