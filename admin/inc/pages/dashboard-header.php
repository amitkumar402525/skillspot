<header class="top_header">
    <div class="acc_logged-in drop_down_wrp">
        <div class="user-show drop_down_btn">
            <a class="avatar" href="javascript:void(0)">
                <img src="../inc/assets/images/demo-user.webp" title="Kevin" alt="Kevin" width="50">
                <span class="user-name"><?php echo (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Dummy" ); ?><span class="role"><?php echo (isset($_SESSION['user_type']) ? $_SESSION['user_type'] : "Dummy" ); ?></span></span>
                <!-- <i class="far fa-chevron-down"></i> -->
            </a>
        </div>
        <div class="user_control drop_down_body">
            <ul class="vertical_list style2">
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
    </div>
</header>