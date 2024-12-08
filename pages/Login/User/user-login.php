<?php
session_start();
include '../../../config/db.php';
include '../../../model/user.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userId = fetchIdByEmail($conn, $email);

    try {
        if (verifyAccountUser($conn, $email, $password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['userId'] = $userId;
            // $_SESSION['admin'] = true;
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
    <title>Login Page</title>
    <link rel="stylesheet" href="user-login.css">
</head>

<body>
    <div class="container">
        <div class="left-section">
            <!-- Left section will contain the image -->
            <img src="../../../assets/img.png" alt="Wallpaper" class="background-image">
        </div>
        <div class="right-section">
            <!-- Right section will contain the login form -->
            <div class="login-form">
                <h2>Login to K-Chronicles</h2>
                <form id="loginForm" action="user-login.php" method="post">
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="login-btn">Login</button>
                </form>
                <span>New here?</span><a href="../../CreateAccount/create-account.php" class="create-account">Create an account</a>
                <a href="../Admin/admin-login.php" id="admin">Login as admin</a>
            </div>
        </div>
    </div>
</body>

</html>