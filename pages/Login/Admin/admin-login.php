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
                <form id="adminLoginForm">
                    <div class="input-group">
                        <label for="admin-username">Username:</label>
                        <input type="text" id="admin-username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="admin-password">Password:</label>
                        <input type="password" id="admin-password" name="password" required>
                    </div>
                    <button type="submit" class="login-btn">Login</button>
                </form>
                <a href="../User/user-login.php" id="user">Login as user</a>
            </div>
            
        </div>
    </div>
    <script src="admin-login.js"></script>
</body>
</html>
