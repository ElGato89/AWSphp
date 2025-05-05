<?php
session_start();
require 'connection.php';
require 'function.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT user_name, email FROM account WHERE user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$username = $user['user_name'];
$email = $user['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = filter_var(trim($_POST['user_name']), FILTER_SANITIZE_STRING);
    $new_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $new_password = trim($_POST['password']);

    if (!empty($new_username) && !empty($new_email) && !empty($new_password)) {
        if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Please enter a valid email address.";
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE account SET user_name = ?, email = ?, password = ? WHERE user_id = ?";
            $update_stmt = $con->prepare($update_query);
            $update_stmt->bind_param("sssi", $new_username, $new_email, $hashed_password, $user_id);
            $update_stmt->execute();

            header("Location: profile.php");
            exit();
        }
    } else {
        $error_message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <!-- Basic meta tags and styles -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">Edit Profile</div>
            <div class="card-body">
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo htmlspecialchars($username); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="button" class="btn btn-light" onclick="location.href='profile.php'">Back to Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

