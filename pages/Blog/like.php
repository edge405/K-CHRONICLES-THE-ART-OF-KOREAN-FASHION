<?php
session_start();

include '../../config/db.php';
include '../../model/like.php';

try {
    $blogId = $_GET['id'];
    $userId = $_SESSION['userId'];

    if (!isAlreadyExist($conn, $blogId, $userId)) {
        insertLike($conn, $blogId, $userId);
        echo "Liked blog";
    } else {
        throw new Exception("Query failed: ");
    }

    header("Location: blog.php?id=$blogId");
    exit;
} catch (Exception $e) {
    deleteLike($conn, $blogId, $userId);
    header("Location: blog.php?id=$blogId");
    exit;
}
