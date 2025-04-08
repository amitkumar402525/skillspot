<?php require "../inc/header.php"; ?>
<?php
	session_start(); // Start the session
	if (isset($_SESSION['user_id'])) {
	    // If the user is not logged in, redirect to the login page
	    header('Location: inner_pages/dashboard.php');
	    exit(); // Terminate the script
	}
?>
<div class="signupForm signinForm">
	<div class="imgLeft">
		<div class="signinForm-video">
			<video autoplay muted loop>
			  <source src="inc\assets\videos\signin-bg-video.mp4" type="video/mp4">
			  Your browser does not support HTML5 video.
			</video>
		</div>
	</div>
	<div class="desRight">
		<div class="logo">
			<a href="<?php echo $homeurl; ?>"><img src="inc/assets/images/logo.png" alt="SkillSpot"></a>
		</div>
		<h2 class="sec-start-h2">Sign in</h2>
		<h6 class="sec-start-h6">or don't have an account? <a href="<?php echo $homeurlMain; ?>admin/signup.php">Sign up</a></h6>
		<div class="formWrp">
			<form class="form-horizontal" id="signinForm">
			    <div class="col-md-12">
					<div class="form-group">
			      		<label class="control-label" for="email">Email: <span class="required">*</span></label>
			        	<input type="email" id="email" class="form-control style1" placeholder="Enter Your Email" name="email">
			        	<span id="emailError" class="error"></span>
			      	</div>
			    </div>
			    <div class="col-md-12">
					<div class="form-group">
			      		<label class="control-label" for="password">Password: <span class="required">*</span></label>
			        	<input type="password" id="password" class="form-control style1" placeholder="Enter Your Password" name="password">
			        	<span id="passwordError" class="error"></span>
			      	</div>
			    </div>
			    <div class="col-md-12">
			    	<div class="form-group">
				    	<div class="fillBtn">
				    		<label class="control-label" for="forgot password">Forgot your password? <a href="#">Reset password.</a></label>
				    	</div>
				    </div>
			    </div>
			    <div class="col-md-12">
			    	<div class="form-group">
				    	<div class="fillBtn">
				    		<input type="submit" id="signin" class="form-control style1" name="signin" value="Sign in">
				    	</div>
				    </div>
			    </div>
			</form>
			<div id="output" class="successful_msg"></div>
		</div>
	</div>
</div>
<?php require "../inc/footer.php"; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#signinForm").on("submit", function(e){
			e.preventDefault();
			
			// Clear previous error messages
            $('.error').html('');
            $(".form-group, .radiobtnstyle, .form-check").removeClass("err"); // Clear any previous error classes

			var data = $(this).serialize();
			data += '&signin=true';
			$.ajax({
				url: "action_pages/user-login.php",
				type: "post",
				data: data,
				success: function(response) {
					jsonResponse = JSON.parse(response);
					if (jsonResponse.success == "true") {
						$("#output").html(jsonResponse.message);
						// alert(JSON.stringify(jsonResponse));

						// Check if redirect URL in the response
	                    if (jsonResponse.redirect) {
	                        window.location.href = jsonResponse.redirect; // Redirect to the dashboard
	                    }
					} else {
						// alert(JSON.stringify(jsonResponse));
						for (const field in jsonResponse.errors) {
							$('#' + field + 'Error').html(jsonResponse.errors[field]);
							if ($('#' + field + 'Error').text().trim() !== "" && $('#' + field + 'Error').html().trim().length !== 0 ) {
								$('#' + field + 'Error').parent(".form-group, .radiobtnstyle, .form-check").addClass("err");
							}
						}
					}
				},
				error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
			});
		});
	});
</script>