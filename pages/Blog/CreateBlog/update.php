<?php
include '../../../config/db.php';
include '../../../model/blogs.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $blogId = $_GET['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $story = $_POST['story'];

    updateBlog($conn, $blogId, $title, $category, $story);
    usleep(100000);
    header("Location: ../blog.php?id=$blogId");
}
