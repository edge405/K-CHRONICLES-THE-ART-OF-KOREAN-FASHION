<?php
include "../config/db.php";

function insertComment($conn, $userId, $blogId, $comment)
{
    $sql = "INSERT INTO comment (userId, blogId, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iis", $userId, $blogId, $comment);

        if ($stmt->execute()) {
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }
}

function populateComment($conn, $blogId)
{

    try {
        $sql = "SELECT 
                    comment.comment,
                    comment.date,
                    users.username
                FROM 
                    comment
                JOIN 
                    users ON comment.userId = users.userId
                WHERE 
                    comment.blogId = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $blogId);

            $stmt->execute();

            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $result;
            } else {
                throw new Exception("Query failed: " . $conn->error);
            }
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}
