<?php
session_start();
require 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT user_name, email FROM account WHERE user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}

// Close statement and connection
$stmt->close();
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Profile Details</h1>
    <table class="table">
        <tr>
            <th>Username:</th>
            <td><?php echo htmlspecialchars($user['user_name']); ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
    </table>
    <div class="mt-4">
        <button class="btn btn-primary" onclick="location.href='edit_profile.php'">Edit Profile</button>
        <button class="btn btn-danger" onclick="confirmDeletion()">Delete Account</button>
        <button class="btn btn-secondary" onclick="location.href='index.php'">Back to Home</button>
    </div>
</div>

<script>
    function confirmDeletion() {
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            location.href = 'delete_account.php';
        }
    }
</script>
</body>
</html>