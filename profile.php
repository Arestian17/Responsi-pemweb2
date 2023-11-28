<?php
    session_start();
    include 'db.php';
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

    $username = $_SESSION["username"];
    $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $row = mysqli_fetch_assoc($user);
    $id = $row["id_user"];
    $useruid = $row["username"];
    $email = $row["email"];
    $password = $row["password"];
    $photo = $row["photo"];
    $role = $row["role"];

    if(isset($_POST['submit'])){
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if($password != $confirm_password){
            echo "<script>alert('Sandi tidak sama');</script>";
        }else {
            $query = "UPDATE users SET email='$email', username='$username', password='$hashed_password' WHERE id_user='$user_id'";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>alert('Berhasil!');
                </script>";
            }else{
                echo "<script>alert('Gagal!');
                window.location.href='register.php';</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" href="image/voli.ico">
    <title>Edit Profile</title>
</head>
<body>
    <div class="nav">
        <a href="index.php"><button class="back"><img src="image/panah 1.png" alt="back" class="panah"></button></a>
    </div>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="my-profile">
                <p>My Profile</p>
                <button type="submit" class="save" name="submit">Save</button>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $photo;?>" alt="profile-image" class="profile-image">
                    <label for="image"><img src="image/kamera 1.png" alt="Choose image" class="update-image"></label>
                </div>
                <div class="input">
                    <div class="kiri">
                        <input type="text" name=user_id value="<?php echo $id;?>" hidden>
                        <input type="file" id="image" name="photo" value="<?php echo $photo; ?>" style="display: none;">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                        <label for="email">Email address</label> 
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?php echo $password; ?>">
                    </div>
                    <div class="kanan">
                    <?php
                        if(isset($_SESSION["admin"])){
                            $role = isset($_POST['role']) ? $_POST['role'] : '';
                            echo '<label for="role">Role</label>
                            <select name="role" id="role">
                                <option value="admin" ' . ($role == "admin" ? 'selected' : '') . '>Admin</option>
                                <option value="user" ' . ($role == "user" ? 'selected' : '') . '>User</option>
                            </select>';
                        }
                    ?>
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirmpassword" name="confirm_password" value="<?php echo $password; ?>">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>