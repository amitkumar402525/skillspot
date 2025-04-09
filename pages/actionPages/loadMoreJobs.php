<?php
require "../../dbConn.php";

$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = 1;

if ($conn) {
    $sql = "SELECT * FROM `jobs` ORDER BY job_id DESC LIMIT $offset, $limit";
    $results = mysqli_query($conn, $sql);

    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            ?>
            <div class="col-md-3 job-card">
                <div class="card_box">
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
                </div>
            </div>
            <?php
        }
    } else {
        echo ''; // No more jobs to load
    }
}
?>
