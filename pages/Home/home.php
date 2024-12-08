<?php
session_start();
include '../../auth/auth.php';
include '../../config/db.php';
include '../../model/user.php';

authentication();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <header>
        <p>issue No.14</p>
        <p>Website Exclusive</p>
        <p>October 7, 2024</p>
    </header>
    <hr class="line">
    <hr class="line">
    <div class="title">
        <a id="home" class="home" href="./home.php">
            <img src="../../assets/home.svg" alt="">
            <span>Home</span>
        </a>

        <h1>K-CHRONICLES: THE ART OF KOREAN FASHION</h1>
        <a id="logout" class="logout" href="../logout.php">
            <img src="../../assets/logout.svg" alt="">
            <span>Logout</span>
        </a>
    </div>
    <hr class="line">

    <section class="latest-posts">
        <h1>LATEST POST</h1>
        <div class="post-container">
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">The Rise of Sustainable Fashion in Korean Streetwear</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">How to Style Oversized Jackets Like a Korean Pro</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">Streetwear Trends That Will Dominate Winter 2024</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">Exploring Minimalism in Streetwear</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">Winter Essentials for a Modern Look</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
        </div>
    </section>

    <section class="blog-posts">
        <h1>BLOGS</h1>
        <div class="post-container-blogs">
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">The Rise of Sustainable Fashion in Korean Streetwear</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">How to Style Oversized Jackets Like a Korean Pro</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">Streetwear Trends That Will Dominate Winter 2024</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">Exploring Minimalism in Streetwear</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
            <div class="post-box">
                <p class="post-date">December 6, 2024</p>
                <h3 class="post-title">Winter Essentials for a Modern Look</h3>
                <a class="read-now-btn">READ NOW</a>
            </div>
        </div>
    </section>

</body>

</html>