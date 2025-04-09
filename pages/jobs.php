<?php require "../inc/header.php"; ?>
<?php require "../dbConn.php"; ?>
<?php
    session_start();
    $user_id = $_SESSION['user_id'];
?>
<div class="bannerInner" style="background-image: url('../assets/images/inner-banner.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="inner_banner_wrp">
                    <div class="top_wrp">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="page_title">Jobs</h2>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <ul class="breadcrumb">
                                    <li class="link"><a href="../index.php">Home</a></li>
                                    <li class="seperator"> / </li>
                                    <li class="active"><a href="/">jobs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="searchGroup">
                        <span class="btn-filter-search-icon"><i class="fa fa-search"></i></span>
                        <div class="search">
                            <input type="text" name="" placeholder="Jobs title or keywords">
                        </div>
                        <div class="btn-filter-search-btn">
                            <input type="submit" name="mainSearch" value="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="default_Sec">
    <div class="container">
        <div class="default_sec_start">
            <h2 class="default_h2">Jobs Listing</h2>
            <h6 class="default_sub_heading">Explore new jobs that suit you</h6>
        </div>
        <div class="row jobs_row">
            <?php
                if ($conn) {
                    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
                    $limit = 1;
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
                    }
                }
            ?>
        </div>

        <div class="col-md-12">
            <div class="read_more">
                <button id="loadMoreJobs" class="btn filled">Load More Jobs</button>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    let offset = 1; // Already loaded 5 on page load

    $('#loadMoreJobs').on('click', function () {
        $.ajax({
            url: 'actionPages/loadMoreJobs.php',
            type: 'POST',
            data: { offset: offset },
            success: function (response) {
                if (response.trim() != "") {
                    $('.jobs_row').append(response); // Add new jobs below the existing ones
                    offset += 1; // Increase offset for next load
                } else {
                    $('#loadMoreJobs').hide(); // Hide the button if no more jobs are available
                }
            }
        });
    });
</script>

<?php require "../inc/footer.php"; ?>
