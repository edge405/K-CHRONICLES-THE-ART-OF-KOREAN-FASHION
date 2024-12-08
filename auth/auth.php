<?php

function authentication()
{
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("Location: ../Login/User/user-login.php"); // Redirect to login page if not logged in
        exit();
    }
}
