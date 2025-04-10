<?php
require "../../dbConn.php";

$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = 1;

$filters = isset($_POST['filters']) ? $_POST['filters'] : [];
$jobTitle = isset($filters['jobTitle']) ? trim($filters['jobTitle']) : '';
$jobLocation = isset($filters['jobLocation']) ? trim($filters['jobLocation']) : '';
$jobCategories = isset($filters['jobCategories']) ? $filters['jobCategories'] : [];

$where = [];

if (!empty($jobTitle)) {
    $safeTitle = mysqli_real_escape_string($conn, $jobTitle);
    $where[] = "jobTitle LIKE '%$safeTitle%'";
}

if (!empty($jobLocation)) {
    $safeLocation = mysqli_real_escape_string($conn, $jobLocation);
    $where[] = "location LIKE '%$safeLocation%'";
}

if (!empty($jobCategories)) {
    $categoryConditions = [];
    foreach ($jobCategories as $cat) {
        $safeCat = mysqli_real_escape_string($conn, $cat);
        $categoryConditions[] = "jobCategories LIKE '%$safeCat%'";
    }
    // Add all category filters as OR
    $where[] = '(' . implode(' OR ', $categoryConditions) . ')';
}

$whereSQL = count($where) ? "WHERE " . implode(" AND ", $where) : "";

$sql = "SELECT * FROM jobs $whereSQL ORDER BY job_id DESC LIMIT $offset, $limit";

$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        ?>
        <div class="col-md-4 job-card">
            <div class="card_box haveFloatBtn">
                <div class="card_header">
                    <h2><a href="#"><?= $row['jobTitle']; ?></a></h2>
                </div>
                <div class="card_body">
                    <ul>
                        <li><i class="fa-solid fa-location-dot"></i><span><?= $row['location']; ?></span></li>
                        <li><i class="fa-solid fa-clock"></i><span><?= $row['jobType']; ?></span></li>
                        <li><i class="fa-solid fa-tag"></i><span><?= $row['jobCategories']; ?></span></li>
                    </ul>
                </div>
                <div class="card_footer">
                    <h6 class="price"><?= $row['salary']; ?></h6>
                    <span class="days"><?= $row['closingDays']; ?> days left</span>
                </div>
                <div class="cardBtn"><a class="btn_default" href="mailto:<?= $user_email ?>">Apply Job</a></div>
            </div>
        </div>
        <?php
    }
} else {
    echo ''; // no more jobs
}
?>
