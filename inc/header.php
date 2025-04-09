<?php require __DIR__ . '/../php_config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>skillspot</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- <link rel="stylesheet" type="text/html" href="<?php echo $localServer; ?>/skillspot/functions.php"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo $localServer; ?>/skillspot/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $localServer; ?>/skillspot/css/style.css">
	<link href="<?php echo $localServer; ?>/skillspot/css/select2.min.css" rel="stylesheet" />
</head>
<body>
	<?php if ($currentpage !== '/skillspot/admin/signup.php' && $currentpage !== '/skillspot/admin/signin.php' && $currentpage !== '/skillspot/admin/inner_pages/dashboard.php' && $currentpage !== '/skillspot/admin/inner_pages/profile.php' && $currentpage !== '/skillspot/contact.php' && $currentpage !== '/skillspot/admin/inner_pages/dashboard-basic_info.php' && $currentpage !== '/skillspot/admin/inner_pages/create_job.php' && $currentpage !== '/skillspot/admin/inner_pages/edit_info.php') {  ?>
	<header class="header">
		<!-- Top bar Starts From Here -->
		<div class="topbar">
			<div class="container">
				<div class="innertop">
					<div class="topLeftNav">
						<a href="#"><i class="fa fa-solid fa-bell"></i><span>Subscribe for job alerts by email!</span></a>
					</div>
					<div class="topRightNav">
						<ul>
							<li><a href="#"><i class="fa fa-phone"></i> <span>+00-65854332</span></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> <span>hi@yoursite.com</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="customNavbar">
			<div class="container">
				<div class="innerNav">
					<div class="logo">
						<a href="<?php echo $homeurl; ?>"><img src="<?php echo $localServer; ?>/skillspot/assets/images/logo.png" alt="skillspot"></a>
					</div>
					<div class="menus">
						<ul class="list-style-none default-style-ul">
							<li><a href="<?php echo $homeurl; ?>">Home</a></li>
							<li><a href="./pages/jobs.php">Jobs</a></li>
							<li><a href="#">Categories</a></li>
							<li><a href="./pages/contact.php">Contact Us</a></li>
						</ul>
					</div>
					<div class="menu_right">
						<div class="btn-group-a">
							<a href="<?php echo $homeurlMain; ?>admin/signin.php">Sign In </a>
							<a href="<?php echo $homeurlMain; ?>admin/signup.php" class="fill-btn">Post a Job</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if ($currentpage !== '/skillspot/pages/candidates.php' && $currentpage !== '/skillspot/signin.php' && $currentpage !== '/skillspot/pages/contact.php' && $currentpage !== '/skillspot/pages/privacy-policy.php' && $currentpage !== '/skillspot/pages/jobs.php') {  ?>
			<div class="bannerSec">
				<div class="backgroundVideo">
					<video autoplay muted loop id="myVideo">
					  <source src="<?php echo $localServer; ?>/skillspot/assets\videos\bannerVideo.mp4" type="video/mp4">
					  Your browser does not support HTML5 video.
					</video>
				</div>
				<div class="bannerContent">
					<h2 class="h2-default">Find remote jobs</h2>
					<p class="p-default">Fill your job in hours, not weeks. Search for free.	</p>
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
				<div class="shape-arrow-bottom"><span class="left"></span><span class="right"></span></div>
			</div>
		<?php } elseif ($currentpage == '/skillspot/pages/jobs.php') {
			?>
			
			<?php } else { ?>

				<div class="bannerInner">
				<ul class="breadcrumb">
					<?php echo $currentpage; ?>
					<li class="link"><a href="#">Home</a></li>
					<li><a href="#">Pictures</a></li>
					<li><a href="#">Summer 15</a></li>
					<li>Italy</li>
				</ul> 
			</div>
		<?php } ?>
<?php

/*
		elseif ($currentpage == '/skillspot/pages/jobs.php') { ?>
			<div class="bannerInner">
				<ul class="breadcrumb">
					<?php echo $currentpage; ?>
					<li><a href="../index.php">Home</a></li>
					<li><a href="/">jobs</a></li>
				</ul> 
			</div>
		<?php } else { ?>
			<div class="bannerInner">
				<ul class="breadcrumb">
					<?php echo $currentpage; ?>
					<li><a href="#">Home</a></li>
					<li><a href="#">Pictures</a></li>
					<li><a href="#">Summer 15</a></li>
					<li>Italy</li>
				</ul> 
			</div>
		<?php } */ ?>
	</header>
<?php } ?>