<?php
session_start();
include '../../auth/auth.php';
include '../../config/db.php';
include '../../model/user.php';
include '../../model/blogs.php';
include '../../services/dateConvert.php';

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
    <?php
    if (isset($_SESSION['admin'])) {
        echo '
            <div id="add-blog-center">
        <a id="add-blog-container" href="../Blog/CreateBlog/create-blog.php">
            <div id="add-blog">

                <img src="../../assets/add.svg" alt="">
                <h1>Add new blog</h1>

            </div>
        </a>
    </div>
            ';
    }
    ?>

    <section class="latest-posts">
        <h1>LATEST POST</h1>
        <div class="post-container">

            <?php
            $result = latestPost($conn);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
            <div class="post-box">
                <p class="post-date"> ' . convertBlog($row['created_at']) . '</p>
                <h3 class="post-title">' . htmlspecialchars($row['blog_title']) . '</h3>
                <a href="../Blog/blog.php?id=' . htmlspecialchars($row['blogId']) . '" class="read-now-btn">READ NOW</a>
            </div>
            ';
                }
            } else {
                echo "<p>No blogs found.</p>";
            }
            ?>
        </div>
    </section>

    <section class="blog-posts">
        <h1>ALL BLOGS</h1>
        <div class="post-container-blogs">

            <?php
            $result = fetchBlogs($conn);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="post-box">
                        <p class="post-date">December 6, 2024</p>
                        <h3 class="post-title"> ' . htmlspecialchars($row['blog_title']) . ' </h3>
                        <a class="read-now-btn">READ NOW</a>
                    </div>
                    ';
                }
            } else {
                echo "<p>No blogs found.</p>";
            }
            ?>
        </div>
    </section>

</body>

</html>