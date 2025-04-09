<?php require "dbConn.php"; ?>
<?php
	session_start();
	$user_id = $_SESSION['user_id'];
?>
<section class="default_Sec">
	<div class="container">
		<div class="default_sec_start">
			<h2 class="default_h2">Latest Remote Jobs</h2>
			<h6 class="default_sub_heading">Explore new jobs that suit you</h6>
		</div>
		<div class="row">
			<?php
				 if ($conn) {
	                $sql = "SELECT * FROM `jobs`";
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
			<!-- <div class="col-md-3">
				<div class="card_box">
					<div class="card_header">
						<h2><a href="#">Content Marketing Manager</a></h2>
					</div>
					<div class="card_body">
						<ul>
							<li><i class="fa-solid fa-location-dot"></i><span>Rochester</span></li>
							<li><i class="fa-solid fa-clock"></i><span>Part Time, Remote</span></li>
							<li><i class="fa-solid fa-tag"></i><span>E-Commerce Marketing </span></li>
						</ul>
					</div>
					<div class="card_footer">
						<h6 class="price">Min $200 /week</h6>
						<span class="days">253 days left</span>
					</div>
				</div>
			</div> -->
			
			<div class="col-md-12">
				<div class="read_more">
					<a href="pages/jobs.php" class="btn filled">Explorer All Jobs</a>
				</div>
			</div>
		</div>
	</div>
</section>