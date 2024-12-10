<?php
session_start();

$_SESSION['edit'] = true;
$blogId = $_GET['id'];

header("Location: ./CreateBlog/create-blog.php?id=$blogId");
