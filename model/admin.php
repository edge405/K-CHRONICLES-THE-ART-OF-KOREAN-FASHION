<?php
include "../config/db.php";

function verifyAccountAdmin($conn, $email, $password)
{
    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT password FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the email parameter to the query
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the user data
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            // Directly compare the passwords
            if ($password === $storedPassword) {
                return true; // Account verified
            } else {
                return false; // Incorrect password
            }
        } else {
            return false; // Email not found
        }
    } else {
        // Query preparation failed
        die("Database error: " . $conn->error);
    }
}

function fetchAdminUsernameByEmail($conn, $email)
{
    $sql = "SELECT username FROM admin WHERE email = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc(); // Fetch the result as an associative array
            return $row['username']; // Return the username
        } else {
            return "username doesn't exist"; // Handle no match case
        }
    } else {
        return "Query preparation failed"; // Handle query preparation failure
    }
}
