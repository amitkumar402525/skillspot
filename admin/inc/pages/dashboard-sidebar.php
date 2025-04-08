<nav class="dash_sidebar_left">
    <div class="logo">
        <a href="<?php echo $homeurl; ?>"><img src="../inc/assets/images/logo-white.png" alt="SkillSpot"></a>
    </div>
    <div class="nav_list">
        <ul class="vertical_list">
            <li class="list_item">
                <a href="../inner_pages/dashboard.php">
                    <i class="fa-regular fa-circle-user"></i>
                    <span class="item_text">Dashboard</span>
                </a>
            </li>
            <li class="list_item">
                <a href="../inner_pages/dashboard-basic_info.php">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="item_text">Basic Info</span>
                </a>
            </li>
            <?php if ($_SESSION['user_type'] == "employer") : ?>
            <li class="list_item">
                <a href="../inner_pages/create_job.php">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="item_text">Create Job</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if ($_SESSION['user_type'] !== "employer") : ?>
            <li class="list_item">
                <a href="../inner_pages/education.php">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="item_text">Education</span>
                </a>
            </li>
            <li class="list_item" <?= (isset($_SESSION['user_type']) == "employer"); ?>>
                <a href="../inner_pages/experience.php">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="item_text">Experience</span>
                </a>
            </li>
            <li class="list_item" <?= (isset($_SESSION['user_type']) == "employer"); ?>>
                <a href="../inner_pages/skills.php">
                    <i class="fa-solid fa-user-gear"></i>
                    <span class="item_text">Skills</span>
                </a>
            </li>
            <li class="list_item">
                <a href="../inner_pages/portfolio.php">
                    <i class="fa-regular fa-user"></i>
                    <span class="item_text">portfolio</span>
                </a>
            </li>
            <li class="list_item">
                <a href="../inner_pages/edit_info.php">
                    <i class="fa-solid fa-gear"></i>
                    <span class="item_text">Settings</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="list_item"><a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="item_text">Logout</span></a></li>
        </ul>
    </div>
</nav>