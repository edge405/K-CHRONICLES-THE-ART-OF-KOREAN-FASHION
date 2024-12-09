<?php
include "../../../model/blogs.php";
include "../../../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $story = $_POST['story'];

    insertBlog($conn, $title, $category, $story);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create-blog.css">
    <title>Create Blog</title>
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
        <a id="home" class="home" href="../../Home/home.php">
            <img src="../../../assets/home.svg" alt="">
            <span>Home</span>
        </a>
        <h1>K-CHRONICLES: THE ART OF KOREAN FASHION</h1>
        <a id="logout" class="logout" href="../../logout.php">
            <img src="../../../assets/logout.svg" alt="">
            <span>Logout</span>
        </a>
    </div>
    <hr class="line">

    <div class="blog-post-form-container">
        <form action="create-blog.php" method="post" class="blog-post-form">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter blog title..." required>

            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="" disabled selected>Select a category...</option>
                <option value="streetwear">Streetwear</option>
                <option value="k-culture">K-Culture</option>
                <option value="analysis">Analysis</option>
            </select>

            <label for="story">Story</label>
            <textarea id="story" name="story" placeholder="Write your story here..." rows="10" required></textarea>

            <button type="submit" class="submit-button">Post Blog</button>
        </form>
    </div>


</body>

</html>