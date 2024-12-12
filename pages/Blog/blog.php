<?php
session_start();
include '../../config/db.php';
include '../../model/user.php';
include '../../model/blogs.php';
include '../../model/comment.php';
include '../../auth/auth.php';
include '../../services/dateConvert.php';

authentication();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['userId'];
    $blogId = $_GET['id'];
    $comment = $_POST['comment'];

    insertComment($conn, $userId, $blogId, $comment);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog.css">
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
        <a id="home" class="home" href="../Home/home.php">
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
        $blog_id = intval($_GET['id']);
        echo "
                <div id='action'>
                    <a id='edit' href='edit.php?id=$blog_id'>Edit</a>
                    <a id='delete' href='delete.php?id=$blog_id'>Delete</a>
                </div>
            ";
    }
    ?>
    <article id="article">
        <?php
        if (isset($_GET['id'])) {
            $blog_id = intval($_GET['id']);
            $result = fetchBlogsById($conn, $blog_id);
            $res = retrieveLikeAndComment($conn, $blog_id);
            $totalLikeComment = $res->fetch_assoc();

            if ($result && $result->num_rows === 1) {
                $row = $result->fetch_assoc();
                echo '
                    <div id="title-flex">
                    <span>
                        <h2>' . htmlspecialchars($row['blog_title']) . '</h2>
                    </span>
                    <span>Published on: ' . htmlspecialchars(convertBlog($row['created_at'])) . '</span>
                    <span>Category: ' . htmlspecialchars($row['category']) . '</span>
                    <span>By: Nicole Ashley</span>';

                echo "<div id='cl-action'>
                        <a href='like.php?id=$blog_id'>❤️ <span>" . htmlspecialchars($totalLikeComment['total_likes']) . "</span></a>
                        <a href='#comment'>💬 <span>" . htmlspecialchars($totalLikeComment['total_comments']) . "</span></a>
                        </div>
                    </div>";



                echo '' . $row['story'] . '
                ';
            }
        }
        ?>

    </article>

    <div class="comment-form-container">
        <form class="comment-form" action="#" method="post">
            <input type="text" id="comment" name="comment" placeholder="Write your comment here..." required>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <div class="comments-section">
        <h3>User Comments:</h3>

        <?php
        $blogId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $result = populateComment($conn, $blogId);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="comment">
                    <div class="comment-header">
                        <p class="comment-author"> ' . htmlspecialchars($row['username']) . ' </p>
                        <p class="comment-date">Posted on: ' . htmlspecialchars(convert($row['date'])) . ' </p>
                    </div>
                    <p class="comment-text"  id="comment">' . htmlspecialchars($row['comment']) . ' </p>
                </div>
            ';
            }
        } else {
            echo "<p class='no-comments'>No comments yet. Be the first to comment!</p>";
        }
        ?>
        <br><br>
        <h1>Related Post:</h1>
        <div id="related-posts">
            <?php
            $result = relatedPost($conn, $blogId);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
            <a id="related-link" class="related-link" href="blog.php?id=' . htmlspecialchars($row['blogId']) . '">' . htmlspecialchars($row['blog_title']) . '</a><br>
            ';
                }
            }
            ?>
        </div>
    </div>



</body>

</html>