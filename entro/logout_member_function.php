<?php
session_start();

if (isset($_POST['confirm_logout'])) {
    // Destroy the session and clear session variables
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();

    // Redirect to login page or home page
    header("Location: index.php");
    exit();
} elseif (isset($_POST['cancel_logout'])) {
    // Redirect to a protected page or user dashboard
    header("Location: index.php");
    exit();
} else {
    // If accessed directly, redirect to index.php
    header("Location: index.php");
    exit();
}
?>
