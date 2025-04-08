<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('Location: ../signin.php');
    exit(); // Terminate the script
}
?>
<?php require "../../inc/header.php"; ?>
<div class="dash_wrp">
    <?php require "../inc/pages/dashboard-sidebar.php"; ?>
    <div class="dash_content_main">
        <?php require "../inc/pages/dashboard-header.php"; ?>
        <section class="main_dash_body">
            <!-- <h2 class="page_title">Welcome back! <?php //echo (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Dummy" ); ?></h2> -->
            <div class="dash_body_inner">
              
            </div>
        </section>
    </div>
</div>
<?php require "../../inc/footer.php"; ?>