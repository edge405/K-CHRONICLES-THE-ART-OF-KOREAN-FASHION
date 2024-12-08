 <?php
    include "../../config/db.php";
    include "../../model/user.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") { // Corrected comparison operator
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        // Check if passwords match
        try {
            if ($password !== $confirm_password) { // Strict inequality operator
                echo "<script>alert('Password does not match');</script>";
            } else {
                // Function to register user
                registerUser($conn, $username, $email, $password);
                echo "<script>alert('Registered user: $username');</script>";
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
     <title>Create Account</title>
     <link rel="stylesheet" href="create-account.css">
 </head>

 <body>
     <div class="container">
         <div class="left-section">
             <!-- Left section with an image -->
             <img src="../../assets/img.png" alt="Create Account Wallpaper" class="background-image">
         </div>
         <div class="right-section">
             <!-- Right section with the create account form -->
             <div class="form-container">
                 <h2>Create an Account</h2>
                 <form action="create-account.php" method="post" id="createAccountForm">
                     <div class="form-group">
                         <label for="username">Username:</label>
                         <input type="text" id="username" name="username" placeholder="Choose a username" required>
                     </div>
                     <div class="form-group">
                         <label for="email">Email:</label>
                         <input type="email" id="email" name="email" placeholder="you@example.com" required>
                     </div>
                     <div class="form-group">
                         <label for="password">Password:</label>
                         <input type="password" id="password" name="password" placeholder="Choose a password" required>
                     </div>
                     <div class="form-group">
                         <label for="confirm-password">Confirm Password:</label>
                         <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                     </div>
                     <button type="submit" class="create-submit-btn">Create Account</button>
                 </form>
                 <p class="login-link">Already have an account? <a href="../Login/User/user-login.php">Login here</a>.</p>
             </div>
         </div>
     </div>
 </body>

 </html>