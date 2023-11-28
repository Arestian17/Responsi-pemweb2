<?php
    include 'db.php';
    session_start();

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    
    $query = "SELECT * FROM teams ORDER BY poin DESC";
    $result = $conn->query($query);

    if(isset($_POST['submit'])){
        $ids = $_POST['id'];
        $poins = $_POST['poin'];

        // Loop through each ID and Poin to perform the update
        for ($i = 0; $i < count($ids); $i++) {
            $id = $ids[$i];
            $poin = $poins[$i];

            $updateQuery = "UPDATE teams SET poin = '$poin' WHERE id = '$id'";
            $result = $conn->query($updateQuery);
        }
    }

    if(isset($_POST['delete'])){
        $del = $_POST['delete'];
        $deleteQuery = "DELETE FROM teams WHERE id = '$del'";
        $result = $conn->query($deleteQuery);
        if($result){
            echo '<script>alert("Deleted Successfully"); document.location="teams.php";</script>';
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
    <link rel="icon" href="image/voli.ico">
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
            <a href="addtim.php" style="font-family: 'Andada Pro'; font-size: 25px;"><button name="add" class="add">Add Teams</button></a>
            <form action="" method="post">
            <table>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Poin</th>
                    <th>Action</th>
                </tr>
                <?php
                $result = $conn->query($query); // Reset result set
                $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='text' name='id[]' value=".$row['id']." hidden>" . $no . "</td>";
                        echo "<td><img src='" . $row['logo'] . "' alt='tim'></td>";
                        echo "<td><a href='players.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>";
                        echo "<td><input type='number' name='poin[]' value=".$row['poin']."></td>";
                        echo "<td><button type='submit' name='submit' class='edit'>Edit</button> <button type='submit' name='delete' class='delete' value='".$row['id']."'>Delete</button></td>";
                        echo "</tr>";
                        $no++;
                    }
                ?>
            </table>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
