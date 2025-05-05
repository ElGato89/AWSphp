<?php
function check_login($conn, $user_name, $email, $password) {
    // Prepare SQL query to fetch user details
    $query = "SELECT * FROM admin WHERE user_name = ? AND email = ?";
    
    // Create a prepared statement
    $stmt = $conn->prepare($query);
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("ss", $user_name, $email);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, return user data
            return $user;
        } else {
            // Incorrect password
            return false;
        }
    } else {
        // User does not exist
        return false;
    }
    
    // Close statement
    $stmt->close();
}

// Create random num function
function random_num($length)
{
    $text = "";
    if ($length <= 5) {
        $length = 5; // To ensure it will never be less than 5
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}
?>
<?php
function get_admin_by_id($conn, $user_id) {
    $query = "SELECT * FROM admin WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}

function update_user($conn, $user_id, $user_name, $email, $hashed_password = null) {
    if ($hashed_password) {
        $query = "UPDATE admin SET user_name = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $user_name, $email, $hashed_password, $user_id);
    } else {
        $query = "UPDATE admin SET user_name = ?, email = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $user_name, $email, $user_id);
    }
    $stmt->execute();
    $stmt->close();
}
?>
