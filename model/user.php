<?php

function fetchUsers($conn)
{
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // while ($row = $result->fetch_assoc()) {
        //     echo "userId: " . $row["userId"] . "<br>";
        //     echo "username: " . $row["username"] . "<br>";
        //     echo "email: " . $row["email"] . "<br>";
        //     echo "password: " . $row["password"] . "<br>";
        // }
        return $result;
    }
}
function fetchIdByEmail($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the result as an associative array
        if ($row = $result->fetch_assoc()) {
            return $row['userId']; // Return the userId
        } else {
            return null; // No result found
        }
    } else {
        return "Query preparation failed"; // Handle query preparation failure
    }
}

function fetchUsernameById($conn, $id)
{
    $sql = "SELECT username FROM users WHERE userId = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

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

function registerUser($conn, $username, $email, $password)
{
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    if ($conn->prepare($sql)) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
}

function verifyAccountUser($conn, $email, $password)
{
    // Prepare the SQL statement to prevent SQL injection
    $sql = "SELECT password FROM users WHERE email = ?";
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
