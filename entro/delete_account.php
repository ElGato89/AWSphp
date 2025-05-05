<?php
session_start();
require 'connection.php';
require 'function.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$query = "SELECT user_name, email FROM account WHERE user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle account deletion
if (isset($_POST['delete_account'])) {
    $delete_query = "DELETE FROM account WHERE user_id = ?";
    $delete_stmt = $con->prepare($delete_query);
    $delete_stmt->bind_param("i", $user_id);
    $delete_stmt->execute();

    // Destroy session and cookies
    session_destroy();
    setcookie("user_id", "", time() - 3600, "/");
    setcookie("user_name", "", time() - 3600, "/");

    // Redirect to index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Account</title>
    <!-- Add your CSS and other meta tags here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .btn-margin {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Account</h1>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['user_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        
        <form method="POST">
            <div class="alert alert-danger" role="alert">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <button type="submit" name="delete_account" class="btn btn-danger btn-margin">Delete Account</button>
            <button type="button" class="btn btn-secondary btn-margin" onclick="location.href='profile.php'">Back to Profile</button>
        </form>
        <button type="button" class="btn btn-primary btn-margin" onclick="location.href='index.php'">Cancel</button>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


