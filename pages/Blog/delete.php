<?php
include '../../config/db.php';
include '../../model/blogs.php';

$blogId = $_GET['id'];

deleteBlog($conn, $blogId);

// Display the alert and then redirect using JavaScript
echo "<script>
    alert('Blog deleted successfully');
    window.location.href = '../Home/home.php';
</script>";
