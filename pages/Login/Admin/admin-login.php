<?php
session_start();
include "../../../model/admin.php";
include "../../../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    try {
        if (verifyAccountAdmin($conn, $email, $password)) {
            $_SESSION['admin'] = true;
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            header("Location: ../../Home/home.php");
            exit();
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Error');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin-login.css">
</head>

<body>
    <div class="container">
        <div class="left-section">
            <!-- Left section with an image -->
            <img src="../../../assets/img.png" alt="Admin Wallpaper" class="background-image">
        </div>
        <div class="right-section">
            <!-- Right section with the admin login form -->
            <div class="login-form">
                <h2>Admin Login</h2>
                <form action="admin-login.php" method="post" id="adminLoginForm">
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="login-btn">Login</button>
                </form>
                <a href="../User/user-login.php" id="user">Login as user</a>
            </div>

        </div>
    </div>
</body>

</html>