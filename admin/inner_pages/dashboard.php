<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to the login page
    header('Location: signin.php');
    exit(); // Terminate the script
}
/* else {
    echo '<p>Welcome, ' . $_SESSION['user_name'] . '!</p>';
    echo '<a href="logout.php">Logout</a>';
}*/
?>
<!-- <h2>Welcome to Dashboard page <?php //echo $_SESSION['user_name']; ?>. And I know you are a <?php //echo $_SESSION['user_type']; ?>.</h2> -->
<?php require "../../inc/header.php"; ?>
<div class="dash_wrp">
    <?php require "../inc/pages/dashboard-sidebar.php"; ?>
    <div class="dash_content_main">
        <?php require "../inc/pages/dashboard-header.php"; ?>
        <section class="main_dash_body">
            <h2 class="page_title">Welcome back! <?php echo (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Dummy" ); ?></h2>
            <div class="dash_body_inner">
              <div class="profile_info">
                <div class="img">
                  <img src="../inc/assets/images/dashboard-banner.jpg" title="dashboard banner" alt="dashboard banner">
                </div>
                <div class="disc">
                  <img src="../inc/assets/images/demo-user.webp" title="Kevin" alt="Kevin">
                  <span class="user-name">
                    <b><?php echo (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Dummy" ); ?></b>
                  </span>
                  <span class="designation">
                    <span>UI/UX Designer</span> / <span class="role"><?php echo (isset($_SESSION['user_type']) ? $_SESSION['user_type'] : "Dummy" ); ?></span>
                  </span>
                </div>
              </div>
              <div class="dash_card_box">
                <div class="actionBtns">
                  <a href="../inner_pages/dashboard-basic_info.php">
                      <i class="fa-solid fa-circle-info"></i>
                      <span class="item_text">Basic Info</span>
                  </a>
                  <a href="education.php">
                      <i class="fa-solid fa-graduation-cap"></i>
                      <span class="item_text">Education</span>
                  </a>
                  <a href="experience.php">
                      <i class="fa-solid fa-briefcase"></i>
                      <span class="item_text">Experience</span>
                  </a>
                  <a href="skills.php">
                      <i class="fa-solid fa-user-gear"></i>
                      <span class="item_text">Skills</span>
                  </a>
                  <a href="portfolio.php">
                      <i class="fa-regular fa-user"></i>
                      <span class="item_text">portfolio</span>
                  </a>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>
<?php require "../../inc/footer.php"; ?>