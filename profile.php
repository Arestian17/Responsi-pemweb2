<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="nav">
        <a href="index.php"><button class="back"><img src="image/panah 1.png" alt="back" class="panah"></button></a>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="my-profile">
                <p>My Profile</p>
                <button type="submit" class="save">Save</button>
            </div>
            <div class="card">
                <div class="image">
                    <img src="image/atlet tim 1.png" alt="profile-image" class="profile-image">
                    <label for="image"><img src="image/kamera 1.png" alt="Choose image" class="update-image"></label>
                </div>
                <div class="input">
                    <div class="kiri">
                        <input type="file" id="image" style="display: none;">
                        <label for="username">Username</label>
                        <input type="text" id="username">
                        <label for="email">Email address</label> 
                        <input type="email" id="email">
                        <label for="password">Password</label>
                        <input type="password" id="password">
                    </div>
                    <div class="kanan">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>