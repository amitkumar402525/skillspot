<?php require "../inc/header.php"; ?>
<?php require "../dbConn.php"; ?>
<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];

?>
<div class="bannerInner d-flex justify-content-center align-items-center" style="background-image: url('../assets/images/inner-banner.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="inner_banner_wrp">
            <div class="top_wrp">
                <div class="row">
                    <div class="col-md-12 d-flex flex-wrap justify-content-center align-items-center text-center">
                        <h2 class="page_title">Jobs</h2>
                        <ul class="breadcrumb">
                            <li class="link"><a href="../index.php">Home</a></li>
                            <li class="seperator"> / </li>
                            <li class="active"><a href="/">jobs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="default_sec_start">
    <h2 class="default_h2">Jobs Listing</h2>
    <h6 class="default_sub_heading">Explore new jobs that suit you</h6>
</div> -->
<section class="default_Sec main_sec">
    <div class="container">
        <div class="job_listing_header">
            <div class="searchGroup multiple">
                <form method="post" id="jobSearchForm">
                    <div class="row">
                        <div class="col">
                            <div class="input_group">
                                <span class="btn-filter-icon"><i class="fa fa-search"></i></span>
                                <input type="text" name="jobTitle" placeholder="Jobs title">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input_group">
                                <span class="btn-filter-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <input type="text" name="jobLocation" placeholder="Enter Location">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input_group">
                                <span class="btn-filter-icon"><i class="fa-solid fa-tag"></i></span>
                                <!-- Multi-select dropdown allowing users to choose multiple options -->
                                <select id="jobCategories" class="jobCategoriesSelect customSelect" data-tags="true" data-max-selection="4" data-placeholder="Select or add a category" name="jobCategories[]" multiple="multiple">
                                    <!-- Accounting and Finance Categories -->
                                    <option disabled><strong>Accounting & Taxation</strong></option>
                                    <option>Analytics</option>
                                    <option>Corporate Finance</option>
                                    <option>Personal Finance</option>
                                    <option>Public Finance</option>

                                    <!-- Customer Service Categories -->
                                    <option disabled><strong>Customer Service</strong></option>
                                    <option>Email Support</option>
                                    <option>Live Chat Support</option>
                                    <option>Telephone Support</option>
                                    <option>Web Commerce Support</option>

                                    <!-- Graphic & Design Categories -->
                                    <option disabled><strong>Graphic & Design</strong></option>
                                    <option>App Design</option>
                                    <option>Digital Design</option>
                                    <option>UX/UI Design</option>
                                    <option>Website Design</option>

                                    <!-- Promotion & Outreach Categories -->
                                    <option disabled><strong>Promotion & Outreach</strong></option>
                                    <option>E-Commerce Marketing</option>
                                    <option>E-Commerce SEO</option>
                                    <option>Marketing Strategy</option>
                                    <option>Social Media Marketing</option>

                                    <!-- Technology & Programming Categories -->
                                    <option disabled><strong>Technology & Programming</strong></option>
                                    <option>App Development</option>
                                    <option>Back-end Development</option>
                                    <option>Front-end Development</option>
                                    <option>Web Development</option>
                                </select>
                            </div>
                        </div>
                        <div class="col" style="flex: unset; width: auto;padding: 0;margin-left: -12px;">
                            <div class="btn-filter-search-btn">
                                <input type="submit" name="mainSearch" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
    let filters = {};
    function fetchJobs(reset = false) {
        if (reset) {
            offset = 0;
            $(".jobs_row").html(""); // clear existing results
        }
        $.ajax({
            url: 'actionPages/loadMoreJobs.php',
            type: 'POST',
            data: {
                offset: offset,
                filters: filters
            },
            success: function (response) {
                if (response.trim() != "") {
                    $('.jobs_row').append(response); // Add new jobs below the existing ones
                    offset += 1; // Increase offset for next load
                } else {
                    $('#loadMoreJobs').hide(); // Hide the button if no more jobs are available
                    $('#loadMoreJobs').parents(".read_more").css("margin-top", "0");
                }
            }
        });
    }

    // Submit form on filter change
    $('#jobSearchForm').on('submit', function (e) {
        e.preventDefault();

        filters.jobTitle = $('input[name="jobTitle"]').val();
        filters.jobLocation = $('input[name="jobLocation"]').val();
        filters.jobCategories = $('#jobCategories').val(); // array

        $('#loadMoreJobs').show();
        fetchJobs(true); // reset and fetch
    });

    $('#loadMoreJobs').on('click', function () {
        fetchJobs();
    });
    // Initial fetch (on page load)
    $(document).ready(function () {
        fetchJobs(true);
    });
</script>

<?php require "../inc/footer.php"; ?>
