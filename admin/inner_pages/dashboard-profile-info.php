<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('Location: signin.php');
    exit(); // Terminate the script
}
?>
<?php require "./inc/header.php"; ?>

<?php require "./inc/footer.php"; ?>