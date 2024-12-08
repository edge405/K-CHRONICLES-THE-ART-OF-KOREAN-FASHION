<?php

function insertBlog($conn, $blog_title, $description, $category, $story)
{
    $sql = "INSERT INTO blogs (adminId, blog_title, description, story, category) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $adminId = 1;

        $stmt->bind_param("issss", $adminId, $blog_title, $description, $story, $category);

        if ($stmt->execute()) {
            echo "<script>alert('new blog created successfully');</script>";
            echo "<script>
            setTimeout(function() {
                window.location.href = 'blog-form.php';
            }, 100); // Redirect after 0.1 seconds
          </script>";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
}

function updateBlog($conn, $blogId, $blog_title, $description, $category, $story)
{
    $sql = "UPDATE blogs 
            SET blog_title = ?, description = ?, category = ?, story = ?
            WHERE blogId = ?     
    ";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $blog_title, $description, $category, $story, $blogId);
        if ($stmt->execute()) {
            echo "<script>alert('updated blog successfully');</script>";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
}

function deleteBlog($conn, $blogId)
{
    // Delete from likes table first
    $stmt1 = $conn->prepare("DELETE FROM likes WHERE blogId = ?");
    if (!$stmt1) {
        die("Error preparing statement 1: " . $conn->error);
    }
    $stmt1->bind_param("i", $blogId);
    if (!$stmt1->execute()) {
        die("Error executing statement 1: " . $stmt1->error);
    }

    // Delete from comment table
    $stmt2 = $conn->prepare("DELETE FROM comment WHERE blogId = ?");
    if (!$stmt2) {
        die("Error preparing statement 2: " . $conn->error);
    }
    $stmt2->bind_param("i", $blogId);
    if (!$stmt2->execute()) {
        die("Error executing statement 2: " . $stmt2->error);
    }

    // Delete from blogs table
    $stmt3 = $conn->prepare("DELETE FROM blogs WHERE blogId = ?");
    if (!$stmt3) {
        die("Error preparing statement 3: " . $conn->error);
    }
    $stmt3->bind_param("i", $blogId);
    if (!$stmt3->execute()) {
        die("Error executing statement 3: " . $stmt3->error);
    }
}

function fetchBlogs($conn)
{
    try {
        $sql = "SELECT * FROM blogs"; // Simple query
        $result = $conn->query($sql); // Execute query

        if ($result) {
            return $result; // Return result set
        } else {
            throw new Exception("Query failed: " . $conn->error);
        }
    } catch (Exception $e) {
        error_log($e->getMessage()); // Log error
        return false; // Return false on failure
    }
}


function fetchBlogsById($conn, $blog_id)
{
    try {
        // Prepare the SQL query
        $stmt = $conn->prepare("SELECT * FROM blogs WHERE blogId = ?");
        $stmt->bind_param("i", $blog_id); // Bind the integer parameter

        // Execute the query
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return $result;
            // $blog = $result->fetch_assoc();
            // return json_encode($blog);
        } else {
            throw new Exception("Query failed: " . $conn->error);
        }
    } catch (Exception $e) {
        error_log($e->getMessage()); // Log error
        return false; // Return false on failure
    }

    $stmt->close(); // Close the prepared statement
}

function retrieveLikeAndComment($conn, $blogId)
{
    try {
        $sql = "SELECT 
        b.blog_title,
        COUNT(DISTINCT l.likeId) AS total_likes,
        COUNT(DISTINCT c.commentId) AS total_comments
        FROM 
            blogs b
        LEFT JOIN 
            likes l ON b.blogId = l.blogId
        LEFT JOIN 
            comment c ON b.blogId = c.blogId
        WHERE 
            b.blogId = ?
        GROUP BY 
            b.blogId;
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $blogId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return $result;
        } else {
            throw new Exception("Query failed: " . $conn->error);
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
    $stmt->close();
}

function latestPost($conn)
{
    try {
        $sql = "SELECT 
                blogId, 
                adminId, 
                blog_title, 
                description, 
                story, 
                category, 
                created_at
                FROM 
                blogs
                ORDER BY 
                created_at DESC
                LIMIT 5; 
            ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return $result;
        } else {
            throw new Exception("Query failed: " . $conn->error);
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}

function relatedPost($conn, $blogId)
{
    try {
        $sql = "SELECT *
                FROM blogs
                WHERE category = (SELECT category FROM blogs WHERE blogId = ?)
                AND blogId != ?
                LIMIT 5  
                ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $blogId, $blogId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return $result;
        } else {
            throw new Exception("Error: ", $conn->error);
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}
