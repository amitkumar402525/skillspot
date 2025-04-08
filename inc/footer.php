<?php if ($currentpage !== '/skillspot/admin/signup.php' && $currentpage !== '/skillspot/admin/signin.php' && $currentpage !== '/skillspot/admin/inner_pages/dashboard.php' && $currentpage !== '/skillspot/admin/inner_pages/profile.php' && $currentpage !== '/skillspot/admin/inner_pages/dashboard-basic_info.php' && $currentpage !== '/skillspot/admin/inner_pages/create_job.php' && $currentpage !== '/skillspot/admin/inner_pages/edit_info.php') {  ?>
	<div class="footer_first">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left">
						<div class="logo"><img src="<?php echo $localServer; ?>/skillspot/assets/images/logo-white.png"></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. </p>
						<div class="social_icons">
							<ul>
								<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right">
						<h2>Join our newsletter to stay up-to-date</h2>
						<form class="subsribe_newsletter_form" method="post">
							<div class="subsribe-form-fields">
								<label>
									Email address: 
									<input type="email" name="EMAIL" placeholder="Enter your email" required="">
									<span class="after"></span>
								</label>
								<input type="submit" value="Subscribe">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="mainFooter">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="column">
						<h2>Company</h2>
						<ul class="default-style-none default-style2-ul">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Meet Our team</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Private Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="column">
						<h2>Company</h2>
						<ul class="default-style-none default-style2-ul">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Meet Our team</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Private Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="column">
						<h2>Company</h2>
						<ul class="default-style-none default-style2-ul">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Meet Our team</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Private Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer_copyright">
				<p>&copy; 2024 RiceTheme. All Right Reserved.</p>
				<ul>
					<li><i class="fa-solid fa-globe"></i> <span>English</span></li>
					<li><i class="fa-solid fa-dollar-sign"></i> <span>USD</span></li>
				</ul>
			</div>
		</div>
	</footer>
<?php } ?>
	<script src="<?php echo $localServer; ?>/skillspot/js/select2.min.js"></script>
	<script src="<?php echo $localServer; ?>/skillspot/js/custom.js"></script>
</body>
</html>