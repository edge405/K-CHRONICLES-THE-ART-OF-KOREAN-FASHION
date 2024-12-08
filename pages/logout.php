<?php
session_start();
session_destroy();
header("Location: ./Login/User/user-login.php");
exit();
