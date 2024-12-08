<?php
include "../config/db.php";

function insertLike($conn, $blogId, $userId)
{
    $sql = "INSERT INTO likes (blogId, userId) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ii", $blogId, $userId);

        if ($stmt->execute()) {
            echo "like inserted";
        } else {
            echo "error" . $conn->error;
        }
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
}

function deleteLike($conn, $blogId, $userId)
{
    $sql = "DELETE FROM likes WHERE blogId = ? && userId = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ii", $blogId, $userId);

        if ($stmt->execute()) {
            echo "deleted sucessfully";
        } else {
            echo "error" . $conn->error;
        }
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
}

function isAlreadyExist($conn, $blogId, $userId)
{
    try {
        $sql = "SELECT * FROM likes WHERE blogId = ? AND userId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $blogId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any record exists
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}
